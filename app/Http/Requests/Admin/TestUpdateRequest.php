<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestUpdateRequest extends FormRequest
{
    public function authorize()
    {
        // adjust authorization as needed (e.g. gate/permission check)
        return auth()->check();
    }

    public function rules()
    {
        return [
            // top-level (if you have other test fields, add them here)
            'metals' => 'nullable|array',
            'metals.*.gjp_item_id' => 'required|integer',
            'metals.*.precious_metal_type_id' => 'required|integer',
            'metals.*.precious_color_id' => 'required|integer',
            'metals.*.stamp_id' => 'required|integer',
            'metals.*.purity' => 'nullable|string|max:255',
            'metals.*.metal_net_weight' => 'required|numeric',

            'gem_stones' => 'nullable|array',
            'gem_stones.*.gjp_item_id' => 'required|integer',
            'gem_stones.*.stone_type' => 'nullable|in:diamond,colored',
            'gem_stones.*.number_of_stones' => 'required|integer',
            'gem_stones.*.total_weight' => 'required|numeric',
            'gem_stones.*.measurement' => 'nullable|string|max:255',
            'gem_stones.*.shape_id' => 'nullable|integer',
            'gem_stones.*.cut_grade_id' => 'nullable|integer',
            'gem_stones.*.color_id' => 'nullable|integer',
            'gem_stones.*.fluorescence_id' => 'nullable|integer',
            'gem_stones.*.clarity_id' => 'nullable|integer',
            'gem_stones.*.plotting' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'gem_stones.*.estimated_id' => 'nullable|integer',
            'gem_stones.*.identification_id' => 'nullable|integer',
            'gem_stones.*.comment_id' => 'nullable|integer',
            // add other gem_stones.* keys as needed
        ];
    }

    public function messages()
    {
        return [
            'metals.*.metal_net_weight.required' => 'Metal net weight is required.',
            'gem_stones.*.total_weight.required' => 'Gemstone total weight is required.',
            // add custom messages as needed
        ];
    }
}
