<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'article' => ['required', 'array'],
            'article.*.metals' => ['sometimes', 'array'],

            'article.*.metals.*.gjp_item_id' => ['required', 'integer', 'exists:gjp_items,id'],
            'article.*.metals.*.precious_metal_type_id' => ['required', 'integer', 'exists:precious_metal_types,id'],
            'article.*.metals.*.precious_color_id' => ['required', 'integer', 'exists:precious_colors,id'],
            'article.*.metals.*.stamp_id' => ['required', 'integer', 'exists:stamps,id'],
            'article.*.metals.*.purity' => ['required', 'string', 'max:50'],
            'article.*.metals.*.metal_net_weight' => ['required', 'numeric', 'min:0'],

            'article.*.gem_stones' => ['sometimes', 'array'],

            'article.*.gem_stones.*.gjp_item_id' => ['required', 'integer', 'exists:gjp_items,id'],
            'article.*.gem_stones.*.stone_type' => ['required', 'in:diamond,colored'],
            'article.*.gem_stones.*.number_of_stones' => ['required', 'integer', 'min:1'],
            'article.*.gem_stones.*.total_weight' => ['required', 'numeric', 'min:0'],
            'article.*.gem_stones.*.measurement' => ['required', 'string', 'max:100'],
            'article.*.gem_stones.*.internal_comment' => ['nullable', 'string', 'max:255'],

            'article.*.gem_stones.*.weight_per_stone' => [
                'nullable', 'numeric', 'min:0',
                'required_if:article.*.gem_stones.*.stone_type,colored'
            ],

            'article.*.gem_stones.*.weight_stone_unit_id' => [
                'nullable', 'integer', 'exists:units,id',
                'required_if:article.*.gem_stones.*.stone_type,colored'
            ],

            'article.*.gem_stones.*.total_weight_unit_id' => [
                'nullable', 'integer', 'exists:units,id',
                'required_if:article.*.gem_stones.*.stone_type,colored'
            ],

            'article.*.gem_stones.*.group_id' => ['nullable', 'integer', 'exists:groups,id'],
            'article.*.gem_stones.*.species_id' => ['nullable', 'integer', 'exists:species,id'],
            'article.*.gem_stones.*.variety_id' => ['nullable', 'integer', 'exists:varieties,id'],
            'article.*.gem_stones.*.transparency_id' => ['nullable', 'integer', 'exists:transparencies,id'],
            'article.*.gem_stones.*.luster_id' => ['nullable', 'integer', 'exists:lusters,id'],
            'article.*.gem_stones.*.phenomena_id' => ['nullable', 'integer', 'exists:phenomenas,id'],

            'article.*.gem_stones.*.shape_id' => [
                'nullable', 'integer', 'exists:shapes,id',
            ],

            'article.*.gem_stones.*.cut_grade_id' => [
                'nullable', 'integer', 'exists:cut_grades,id'
            ],

            'article.*.gem_stones.*.color_id' => [
                'nullable', 'integer', 'exists:colors,id'
            ],

            'article.*.gem_stones.*.clarity_id' => [
                'nullable', 'integer', 'exists:clarities,id'
            ],

            'article.*.gem_stones.*.fluorescence_id' => [
                'nullable', 'integer', 'exists:fluorescences,id',
                'required_if:article.*.gem_stones.*.stone_type,diamond'
            ],

            'article.*.gem_stones.*.identification_id' => [
                'nullable', 'integer', 'exists:identifications,id',
                'required_if:article.*.gem_stones.*.stone_type,diamond'
            ],

            'article.*.gem_stones.*.estimated_id' => ['required', 'integer', 'exists:estimateds,id'],
            'article.*.gem_stones.*.comment_id' => ['nullable', 'integer', 'exists:comments,id'],

            'article.*.gem_stones.*.plotting' => [
                'nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'
            ],
        ];
    }


    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'service_order_id' => 'service order',
            'article.*.metals' => 'article.*.metals',
            'gem_stones' => 'gem stones',
            'article.*.metals.*.gjp_item_id'            => 'metal article',
            'article.*.metals.*.precious_metal_type_id' => 'metal type',
            'article.*.metals.*.precious_color_id'      => 'metal color',
            'article.*.metals.*.stamp_id'               => 'metal stamp',
            'article.*.metals.*.purity'                 => 'metal purity',
            'article.*.metals.*.metal_net_weight'       => 'metal net weight',
            'article.*.gem_stones.*.gjp_item_id'        => 'gemstone article',
            'article.*.gem_stones.*.stone_type'         => 'gemstone type',
            'article.*.gem_stones.*.number_of_stones'   => 'gemstone number of stones',
            'article.*.gem_stones.*.total_weight'       => 'gemstone total weight',
            'article.*.gem_stones.*.weight_per_stone'   => 'gemstone weight per stone',
            'article.*.gem_stones.*.measurement'        => 'gemstone measurement',
            'article.*.gem_stones.*.shape_id'           => 'gemstone shape',
            'article.*.gem_stones.*.cut_grade_id'       => 'gemstone cut grade',
            'article.*.gem_stones.*.color_id'           => 'gemstone color',
            'article.*.gem_stones.*.clarity_id'         => 'gemstone clarity',
            'article.*.gem_stones.*.group_id'           => 'gemstone group',
            'article.*.gem_stones.*.species_id'         => 'gemstone species',
            'article.*.gem_stones.*.variety_id'         => 'gemstone variety',
            'article.*.gem_stones.*.transparency_id'    => 'gemstone transparency',
            'article.*.gem_stones.*.luster_id'          => 'gemstone luster',
            'article.*.gem_stones.*.fluorescence_id'    => 'gemstone fluorescence',
            'article.*.gem_stones.*.phenomena_id'       => 'gemstone phenomena',
            'article.*.gem_stones.*.estimated_id'       => 'gemstone estimated',
            'article.*.gem_stones.*.identification_id'  => 'gemstone identification',
            'article.*.gem_stones.*.comment_id'         => 'gemstone comment',
            'article.*.gem_stones.*.total_weight_unit_id'         => 'gemstone weight unit id',
            'article.*.gem_stones.*.weight_stone_unit_id'         => 'gemstone weight stone unit',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'service_order_id.required' => 'Service order is required.',
            'service_order_id.exists' => 'The selected service order does not exist.',

            'article.*.metals.*.gjp_item_id.required_with' => 'Article is required for each metal.',
            'article.*.metals.*.gjp_item_id.exists' => 'The selected article does not exist.',
            'article.*.metals.*.precious_metal_type_id.required_with' => 'Metal type is required for each metal.',
            'article.*.metals.*.precious_metal_type_id.exists' => 'The selected metal type does not exist.',
            'article.*.metals.*.precious_color_id.required_with' => 'Metal color is required for each metal.',
            'article.*.metals.*.precious_color_id.exists' => 'The selected metal color does not exist.',
            'article.*.metals.*.stamp_id.required_with' => 'Stamp is required for each metal.',
            'article.*.metals.*.stamp_id.exists' => 'The selected stamp does not exist.',
            'article.*.metals.*.metal_net_weight.numeric' => 'Metal net weight must be a valid number.',
            'article.*.metals.*.metal_net_weight.min' => 'Metal net weight cannot be negative.',

            'article.*.gem_stones.*.gjp_item_id.required_with' => 'Article is required for each gemstone.',
            'article.*.gem_stones.*.gjp_item_id.exists' => 'The selected article does not exist.',

            'article.*.gem_stones.*.stone_type.required_with' => 'Stone type is required (Diamond or Colored).',
            'article.*.gem_stones.*.stone_type.in' => 'Stone type must be either "diamond" or "colored".',

            'article.*.gem_stones.*.number_of_stones.integer' => 'Number of stones must be a whole number.',
            'article.*.gem_stones.*.number_of_stones.min' => 'Number of stones must be at least 1.',

            'article.*.gem_stones.*.total_weight.numeric' => 'Total weight must be a valid number.',
            'article.*.gem_stones.*.total_weight.min' => 'Total weight cannot be negative.',

            'article.*.gem_stones.*.weight_per_stone.numeric' => 'Weight per stone must be a valid number.',
            'article.*.gem_stones.*.weight_per_stone.min' => 'Weight per stone cannot be negative.',

            'article.*.gem_stones.*.weight_per_stone.required_if' => 'Weight per stone is required when the gemstone type is colored.',

            'article.*.gem_stones.*.measurement.max' => 'Measurement cannot exceed 100 characters.',

            'article.*.gem_stones.*.plotting.file' => 'Plotting must be a valid file.',
            'article.*.gem_stones.*.plotting.mimes' => 'Plotting file must be a PDF, JPG, JPEG, or PNG.',
            'article.*.gem_stones.*.plotting.max' => 'Plotting file cannot exceed 5MB.',

            // Diamond-specific
            'article.*.gem_stones.*.fluorescence_id.required_if' => 'Fluorescence is required for diamond gemstones.',
            'article.*.gem_stones.*.fluorescence_id.exists' => 'The selected fluorescence option does not exist.',

            'article.*.gem_stones.*.identification_id.required_if' => 'Identification is required for diamond gemstones.',
            'article.*.gem_stones.*.identification_id.exists' => 'The selected identification does not exist.',

            // Others
            'article.*.gem_stones.*.shape_id.exists' => 'The selected shape does not exist.',
            'article.*.gem_stones.*.cut_grade_id.exists' => 'The selected cut grade does not exist.',
            'article.*.gem_stones.*.color_id.exists' => 'The selected color does not exist.',
            'article.*.gem_stones.*.clarity_id.exists' => 'The selected clarity does not exist.',
            'article.*.gem_stones.*.group_id.exists' => 'The selected group does not exist.',
            'article.*.gem_stones.*.species_id.exists' => 'The selected species does not exist.',
            'article.*.gem_stones.*.variety_id.exists' => 'The selected variety does not exist.',
            'article.*.gem_stones.*.transparency_id.exists' => 'The selected transparency does not exist.',
            'article.*.gem_stones.*.luster_id.exists' => 'The selected luster does not exist.',
            'article.*.gem_stones.*.phenomena_id.exists' => 'The selected phenomenon does not exist.',
            'article.*.gem_stones.*.estimated_id.required' => 'Estimated field is required.',
            'article.*.gem_stones.*.estimated_id.exists' => 'The selected estimated option does not exist.',
            'article.*.gem_stones.*.comment_id.exists' => 'The selected comment does not exist.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        return parent::failedValidation($validator);
    }
}
