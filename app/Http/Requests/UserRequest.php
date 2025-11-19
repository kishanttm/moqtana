<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // If route model binding is used (e.g. admin/users/{user})
        $userId = $this->user?->id ?? $this->route('user')?->id;

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email','max:255',Rule::unique('users', 'email')->ignore($userId),],
            'password' => [$userId ? 'nullable' : 'required', Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols(),'confirmed',],
            'valuation_membership_number' => ['nullable','string','max:255',Rule::unique('users', 'valuation_membership_number')->ignore($userId),],
            'valuation_type' => ['nullable','string','max:255',],
            'profile_image_path' => ['nullable', 'file', 'image', 'max:5120'], // 5 MB
            'signature_path' => ['nullable', 'file', 'mimes:png,jpg,jpeg,pdf', 'max:10240'], // 10 MB
            'role_single' => ['required', 'integer'], // Role must be selected
        ];

        // ✅ If role is "user", make these required
        if ($this->role_single && strtolower($this->role_name_from_id($this->role_single)) === 'user') {
            $rules['valuation_membership_number'] = ['required', 'string', 'max:255'];
            $rules['valuation_type'] = ['required', 'string', 'max:255'];
            $rules['signature_path'] = [ $userId ? 'nullable' : 'required', 'file', 'mimes:png,jpg,jpeg,pdf', 'max:10240'];
        } else {
            $rules['valuation_membership_number'] = ['nullable', 'string', 'max:255'];
            $rules['valuation_type'] = ['nullable', 'string', 'max:255'];
        }

        return $rules;
    }
    
    // Optional helper to get role name
    protected function role_name_from_id($roleId)
    {
        return \Spatie\Permission\Models\Role::find($roleId)?->name;
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already in use.',
            'password.confirmed' => 'Password confirmation does not match.',
            'valuation_membership_number.unique' => 'This membership number is already registered.',
            'profile_image_path.max' => 'Profile image must not exceed 5 MB.',
            'signature_path.max' => 'Signature file must not exceed 10 MB.',
            'role_single.required' => 'Please select a role for the user.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'valuation_membership_number' => 'Valuation Membership Number',
            'valuation_type' => 'Valuation Type',
            'profile_image_path' => 'Profile Image',
            'signature_path' => 'Signature',
            'role_single' => 'Role',
        ];
    }
}
