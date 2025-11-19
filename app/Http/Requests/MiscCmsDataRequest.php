<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MiscCmsDataRequest extends FormRequest
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
        return [
            // Precious Metal Types
            'metalTypes' => ['array'],
            'metalTypes.*.name' => ['required', 'string'],
            'metalTypes.*.id' => ['sometimes'],

            // Precious Colors
            'colors' => ['array'],
            'colors.*.name' => ['required', 'string'],
            'colors.*.id' => ['sometimes'],

            // Stamps
            'stamps' => ['nullable', 'array'],
            'stamps.*.id' =>['required', 'string'],
            'stamps.*.name' => ['sometimes'],

            // PC Statuses
            'statuses' => ['nullable', 'array'],
            'statuses.*.id' =>['required', 'string'],
            'statuses.*.name' => ['sometimes'],

            // Jewelry Types
            'jewelryTypes' => ['nullable', 'array'],
            'jewelryTypes.*.id' =>['required', 'string'],
            'jewelryTypes.*.name' => ['sometimes'],

            // Comments
            'comments' => ['nullable', 'array'],
            'comments.*.id' =>['required', 'string'],
            'comments.*.name' => ['sometimes'],
        ];
    }

    public function messages(): array
    {
        return [
            'metalTypes.*.name.required' => 'Metal Type is required.',
            'colors.*.name.required' => 'Precious Color is required.',
            'stamps.*.name.required' => 'Stamps is required.',
            'statuses.*.name.required' => 'Status is required.',
            'jewelryTypes.*.name.required' => 'Jewelry Type is required.',
            'comments.*.name.required' => 'Comment is required.',
        ];
    }

    public function attributes(): array
    {
        return [
            'metalTypes.*.name' => 'Metal Type',
            'colors.*.name' => 'Precious Color',
            'stamps.*.name' => 'Stamp',
            'statuses.*.name' => 'Status',
            'jewelryTypes.*.name' => 'Jewelry Type',
            'comments.*.name' => 'Comment',
        ];
    }

}
