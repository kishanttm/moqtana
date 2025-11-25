<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\GjpItem;
use App\Models\GjpItemImage;

class ServiceOrderRequest extends FormRequest
{
    public function authorize()
    {
        // adjust according to your auth logic
        return true;
    }

    public function rules()
    {
        $serviceType = $this->input('service_type');
        
        $rules = [
            // Main service order fields
            'client_id' => ['required', 'exists:clients,id'],
            'service_type' => ['required', 'in:valuation,consultation'],
            'delivery_date' => ['required', 'date'],
            'comment' => ['nullable', 'string'],
            'has_other_owners' => ['sometimes', 'boolean'],
            
            // Articles array validation
            'articles' => ['required', 'array', 'min:1'],
            'articles.*.id' => ['nullable', 'exists:gjp_items,id'],
            
            // Article fields - all required
            'articles.*.jewellery_type_id' => ['required', 'exists:jewelry_types,id'],
            'articles.*.total_weight' => ['required', 'numeric', 'min:0.01'],
            'articles.*.weight_unit' => ['required'],
            // 'articles.*.studded_stone_id' => ['required', 'exists:precious_metal_types,id'],
            'articles.*.comment' => ['nullable', 'string'],
            
            // Article file uploads - optional
            'articles.*.article_belonging_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:10240'],
            'articles.*.previous_valuation_report' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
            'articles.*.invoice_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:10240'],
            'articles.*.attachment_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:10240'],
            
            // Images validation - will be conditionally required
            'articles.*.images' => ['nullable', 'array'],
            'articles.*.images.*.id' => ['nullable', 'exists:gjp_item_images,id'],
            // File validation: conditionally required based on whether article has existing images
            'articles.*.images.*.file' => ['nullable', 'file', 'image', 'max:5120'],
            'articles.*.images.*.name' => ['nullable', 'string', 'max:255'],
            'articles.*.images.*.for_testing' => ['nullable', 'boolean'],
            'articles.*.images.*.for_valuation_report' => ['nullable', 'boolean'],
            
            // Deleted images tracking
            'articles.*.images_to_delete' => ['nullable', 'array'],
            'articles.*.images_to_delete.*' => ['exists:gjp_item_images,id'],
        ];
        
        // Valuation service specific fields
        if ($serviceType === 'valuation') {
            $rules['purpose'] = ['required'];
            $rules['how_many'] = ['required', 'numeric', 'min:1'];
            $rules['ownership_percentage'] = ['required', 'numeric', 'min:1', 'max:100'];
            $rules['government_referral'] = ['required', 'string', 'max:255'];
            $rules['other_use_of_report'] = ['required', 'string', 'max:255'];
        }
        // Consultation service specific fields
        elseif ($serviceType === 'consultation') {
            $rules['consultation'] = ['required', 'string', 'max:500'];
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            // Service order fields
            'client_id.required' => 'Please select a client.',
            'service_type.required' => 'Service type is required.',
            'service_type.in' => 'Selected service type is invalid.',
            'delivery_date.required' => 'Delivery date is required.',
            'delivery_date.date' => 'Delivery date must be a valid date.',
            
            // Valuation service messages
            'purpose.required' => 'Purpose of Valuation is required.',
            'purpose.in' => 'Selected purpose is invalid.',
            'how_many.required' => 'How Many is required.',
            'how_many.numeric' => 'How Many must be a number.',
            'how_many.min' => 'How Many must be at least 1.',
            'ownership_percentage.required' => 'What is your percentage is required.',
            'ownership_percentage.numeric' => 'Percentage must be a number.',
            'ownership_percentage.min' => 'Percentage must be at least 1.',
            'ownership_percentage.max' => 'Percentage cannot exceed 100.',
            'government_referral.required' => 'Any Government Referral is required.',
            'government_referral.string' => 'Government Referral must be text.',
            'other_use_of_report.required' => 'Is there any other will use the valuation report is required.',
            'other_use_of_report.string' => 'Other use of report must be text.',
            
            // Consultation service messages
            'consultation.required' => 'Consultation type is required.',
            'consultation.string' => 'Consultation type must be text.',
            
            // Articles validation messages
            'articles.required' => 'At least one article/jewelry item is required.',
            'articles.array' => 'Articles must be an array.',
            'articles.min' => 'At least one article is required.',
            
            'articles.*.jewellery_type_id.required' => 'Jewellery Type is required for each article.',
            'articles.*.jewellery_type_id.exists' => 'Selected Jewellery Type is invalid.',
            'articles.*.total_weight.required' => 'Total Weight is required for each article.',
            'articles.*.total_weight.numeric' => 'Total Weight must be a number.',
            'articles.*.total_weight.min' => 'Total Weight must be greater than 0.',
            'articles.*.weight_unit.required' => 'Weight Unit is required.',
            'articles.*.weight_unit.in' => 'Weight Unit must be either grams or kg.',
            'articles.*.studded_stone_id.required' => 'Studded Stones is required for each article.',
            'articles.*.studded_stone_id.exists' => 'Selected Studded Stone is invalid.',
            
            // Images validation messages
            'articles.*.images.required' => 'At least one picture is required for each article.',
            'articles.*.images.array' => 'Pictures must be an array.',
            'articles.*.images.min' => 'At least 2 pictures are required for each article.',
            'articles.*.images.*.file' => 'Picture file is required for new images. You can leave it empty when editing existing images.',
            'articles.*.images.*.file.image' => 'Each picture must be an image file.',
            'articles.*.images.*.file.max' => 'Each picture cannot exceed 5MB.',
            'articles.*.images.*.name.string' => 'Picture description must be text.',
            'articles.*.images.*.name.max' => 'Picture description cannot exceed 255 characters.',
            
            // File uploads
            'articles.*.article_belonging_file.file' => 'Article belongings must be a valid file.',
            'articles.*.article_belonging_file.mimes' => 'Article belongings must be PDF, JPG, PNG, DOC, or DOCX.',
            'articles.*.article_belonging_file.max' => 'Article belongings file cannot exceed 10MB.',
            'articles.*.previous_valuation_report.file' => 'Previous valuation report must be a valid file.',
            'articles.*.previous_valuation_report.mimes' => 'Previous valuation report must be PDF, JPG, or PNG.',
            'articles.*.previous_valuation_report.max' => 'Previous valuation report cannot exceed 10MB.',
            'articles.*.invoice_file.file' => 'Invoice file must be a valid file.',
            'articles.*.invoice_file.mimes' => 'Invoice file must be PDF, JPG, PNG, DOC, or DOCX.',
            'articles.*.invoice_file.max' => 'Invoice file cannot exceed 10MB.',
            'articles.*.attachment_file.file' => 'Attachment file must be a valid file.',
            'articles.*.attachment_file.mimes' => 'Attachment file must be PDF, JPG, PNG, DOC, or DOCX.',
            'articles.*.attachment_file.max' => 'Attachment file cannot exceed 10MB.',
        ];
    }

    /**
     * Configure the validator instance with custom validation logic.
     * 
     * Image validation rules:
     * 1. If article already has images in DB (gjp_item_images.gjp_item_id = article_id) → images NOT required
     * 2. If article DOES NOT have any image in DB and user DOES NOT upload new image → images REQUIRED
     * 3. If user uploads new image → validation passes
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach ($this->articles ?? [] as $articleIndex => $article) {
                // 3. If new images are added → they MUST have file
                if (!empty($article['images'])) {

                    foreach ($article['images'] as $imgIndex => $image) {
                        $articleImageId = $image['id'] ?? null;
                        $hasImageInDb = false;
                        if ($articleImageId) {
                            $hasImageInDb = GjpItemImage::where('id', $articleImageId)
                                ->whereNotNull('image_path')
                                ->exists();
                        }

                        // 2. If DB has image AND user didn't add new => OK
                        if ($hasImageInDb) {
                            continue;
                        }
                        $hasFile =
                            isset($image['file']) ||
                            $this->hasFile("articles.$articleIndex.images.$imgIndex.file");

                        if (!$hasFile) {
                            $validator->errors()->add(
                                "articles.$articleIndex.images.$imgIndex.file",
                                "Image is required for Article " . ($articleIndex + 1)
                            );
                        }
                    }

                } else {

                    // 4. If NO DB image AND NO new upload → REQUIRED
                    if (!$hasImageInDb) {
                        $validator->errors()->add(
                            "articles.$articleIndex.images",
                            "At least one image is required for Article " . ($articleIndex + 1)
                        );
                    }
                }
            }
        });
    }
}

