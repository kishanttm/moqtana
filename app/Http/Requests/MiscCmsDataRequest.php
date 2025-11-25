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
            'stamps.*.name' =>['required', 'string'],
            'stamps.*.id' => ['sometimes'],

            // PC Statuses
            'statuses' => ['nullable', 'array'],
            'statuses.*.name' =>['required', 'string'],
            'statuses.*.id' => ['sometimes'],

            // Jewelry Types
            'jewelryTypes' => ['nullable', 'array'],
            'jewelryTypes.*.name' =>['required', 'string'],
            'jewelryTypes.*.id' => ['sometimes'],

            // Comments
            'comments' => ['array'],
            'comments.*.name' =>['required', 'string'],
            'comments.*.id' => ['sometimes'],

            // purposeOfValuations
            'purposeOfValuations' => ['array'],
            'purposeOfValuations.*.name' =>['required', 'string'],
            'purposeOfValuations.*.id' => ['sometimes'],

            // studdedStones
            'studdedStones' => ['array'],
            'studdedStones.*.name' =>['required', 'string'],
            'studdedStones.*.id' => ['sometimes'],

            // studdedStones
            'units' => ['array'],
            'units.*.name' =>['required', 'string'],
            'units.*.id' => ['sometimes'],

            // Shape
            'shapes' => ['array'],
            'shapes.*.name' => ['required','string'],

            // Cut Grade
            'cutGrades' => ['array'],
            'cutGrades.*.name' => ['required','string'],

            // Gem Color
            'gemColors' => ['array'],
            'gemColors.*.name' => ['required','string'],

            // Clarity
            'clarities' => ['array'],
            'clarities.*.name' => ['required','string'],

            // Group
            'groups' => ['array'],
            'groups.*.name' => ['required','string'],

            // Transparency
            'transparencies' => ['array'],
            'transparencies.*.name' => ['required','string'],

            // Luster
            'lusters' => ['array'],
            'lusters.*.name' => ['required','string'],

            // Species
            'species' => ['array'],
            'species.*.name' => ['required','string'],

            // Variety
            'varieties' => ['array'],
            'varieties.*.name' => ['required','string'],

            // Fluorescence
            'fluorescences' => ['array'],
            'fluorescences.*.name' => ['required','string'],

            // Phenomena
            'phenomenas' => ['array'],
            'phenomenas.*.name' => ['required','string'],

            // Estimated
            'estimateds' => ['array'],
            'estimateds.*.name' => ['required','string'],

            // Identification
            'identifications' => ['array'],
            'identifications.*.name' => ['required','string'],
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
            'purposeOfValuations.*.name.required' => 'Purpose Of Valuation is required.',
            'studdedStones.*.name.required' => 'Studded Stone is required.',
            'units.*.name.required' => 'Unit is required.',
            'shapes.*.name.required' => 'Shape is required.',
            'cutGrades.*.name.required' => 'Cut Grade is required.',
            'gemColors.*.name.required' => 'Color is required.',
            'clarities.*.name.required' => 'Clarity is required.',
            'groups.*.name.required' => 'Group is required.',
            'transparencies.*.name.required' => 'Transparency is required.',
            'lusters.*.name.required' => 'Luster is required.',
            'species.*.name.required' => 'Species is required.',
            'varieties.*.name.required' => 'Variety is required.',
            'fluorescences.*.name.required' => 'Fluorescence is required.',
            'phenomenas.*.name.required' => 'Phenomena is required.',
            'estimateds.*.name.required' => 'Estimated is required.',
            'identifications.*.name.required' => 'Identification is required.',
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
            'purposeOfValuations.*.name' => 'Purpose Of Valuation',
            'studdedStones.*.name' => 'Studded Stone',
            'units.*.name' => 'Unit',
        ];
    }

}
