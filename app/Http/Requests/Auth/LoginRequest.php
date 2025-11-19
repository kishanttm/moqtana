<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => ['required','captcha'],
        ];
    }

    public function messages(): array
    {
        return [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha'  => 'Captcha verification failed, please try again.',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $lockoutTime = env('LOCKOUT_TIME') ?? 5;

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(array_merge($this->only('email', 'password'), ['status' => '1']), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey(),$lockoutTime * 60);

            throw ValidationException::withMessages([
                'email' => 'Your account is inactive or the credentials are invalid.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        $time = $this->formatInterval($seconds);

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'time' => $time,
            ]),
        ]);
    }

    protected function formatInterval(int $seconds): string
    {
        $days = floor($seconds / 86400);
        $hours = floor(($seconds % 86400) / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $secs = $seconds % 60;

        $parts = [];
        if ($days > 0)    $parts[] = "$days day" . ($days > 1 ? 's' : '');
        if ($hours > 0)   $parts[] = "$hours hour" . ($hours > 1 ? 's' : '');
        if ($minutes > 0) $parts[] = "$minutes minute" . ($minutes > 1 ? 's' : '');
        if ($secs > 0)    $parts[] = "$secs second" . ($secs > 1 ? 's' : '');

        return implode(' ', $parts);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
