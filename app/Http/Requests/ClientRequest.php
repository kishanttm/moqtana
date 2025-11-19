<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $type = $this->input('client_type');

        $clientId = $this->route('client')?->id;
        
        $rules = [
            'client_type' => 'required|in:individual,business',
        ];

        if ($type === 'individual') {
            $rules = array_merge($rules, [
                'individual_name' => 'required|string|max:255',
                'national_id' => 'required|string|max:50|unique:clients,national_id,' . $clientId,
                'mobile_number' => ['required', 'string', 'max:50', 'regex:/^[0-9]+$/'],
                'address' => 'nullable|string|max:500',
                'individual_email' => 'required|email|max:255',
                'individual_documents' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);
        }

        if ($type === 'business') {
            $rules = array_merge($rules, [
                'company_name' => 'required|string|max:255',
                'unified_number' => 'required|string|max:100|unique:clients,unified_number,' . $clientId,
                'vat_number' => 'required|string|max:100',
                'address_business' => 'required|string|max:500',
                'ceo_name' => 'required|string|max:255',
                'ceo_email' => 'required|email|max:255',
                'representative_name' => 'required|string|max:255',
                'representative_mobile' => ['required', 'string', 'max:50', 'regex:/^[0-9]+$/'],
                'representative_email' => 'required|email|max:255',
                'accountant_name' => 'required|string|max:255',
                'accountant_mobile' => ['required', 'string', 'max:50', 'regex:/^[0-9]+$/'],
                'accountant_email' => 'required|email|max:255',
                'documents' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'company_logo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ]);
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            // Common
            'client_type.required' => 'Please select the client type.',

            // 🧍 Individual Client
            'individual_name.required' => 'Client name is required.',
            'national_id.required' => 'National ID is required.',
            'national_id.unique' => 'This National ID already exists.',
            'mobile_number.required' => 'Mobile number is required.',
            'mobile_number.regex' => 'Mobile number must contain only digits.',
            'individual_email.required' => 'Client email address is required.',
            'individual_email.email' => 'Please enter a valid email address.',

            // 🏢 Business Client
            'company_name.required' => 'Company name is required.',
            'unified_number.required' => 'Unified number is required.',
            'unified_number.unique' => 'This Unified number already exists.',
            'vat_number.required' => 'VAT number is required.',
            'address_business.required' => 'Business address is required.',
            'ceo_name.required' => 'CEO name is required.',
            'ceo_email.required' => 'CEO email address is required.',
            'ceo_email.email' => 'Please enter a valid CEO email address.',
            'representative_name.required' => 'Representative name is required.',
            'representative_mobile.required' => 'Representative mobile number is required.',
            'representative_mobile.regex' => 'Representative mobile number must contain only digits.',
            'representative_email.required' => 'Representative email address is required.',
            'representative_email.email' => 'Please enter a valid representative email address.',
            'accountant_name.required' => 'Accountant name is required.',
            'accountant_mobile.required' => 'Accountant mobile number is required.',
            'accountant_mobile.regex' => 'Accountant mobile number must contain only digits.',
            'accountant_email.required' => 'Accountant email address is required.',
            'accountant_email.email' => 'Please enter a valid accountant email address.',

            // 🗂️ Files
            'individual_documents.mimes' => 'Documents must be a PDF or image file (JPG, JPEG, PNG).',
            'individual_documents.max' => 'Documents must not exceed 2MB.',
            'documents.mimes' => 'Documents must be a PDF or image file (JPG, JPEG, PNG).',
            'documents.max' => 'Documents must not exceed 2MB.',
            'company_logo.mimes' => 'Company logo must be a JPG or PNG image.',
            'company_logo.max' => 'Company logo must not exceed 2MB.',
        ];
    }
}
