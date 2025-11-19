@extends('layouts.app')

@section('title', __('Edit Client'))

@section('content')
<!-- breadcrumb -->
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['edit_client']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}" class="link">{{ $cmsTranslations['clients_list']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['edit_client']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row g-lg-4 g-3">
    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <p class="mb-1 form-label">Choose Client Type</p>
                    <div class="client-type-wrapper border p-1 rounded d-inline-flex mb-4">
                        <label class="client-type-option">
                            <input type="radio" name="client_type" value="individual"
                                {{ old('client_type', $client->client_type) == 'individual' ? 'checked' : '' }}>
                            <span>Individuals</span>
                        </label>
    
                        <label class="client-type-option">
                            <input type="radio" name="client_type" value="business"
                                {{ old('client_type', $client->client_type) == 'business' ? 'checked' : '' }}>
                            <span>Business</span>
                        </label>
                    </div>
                    <div id="individualFields">
                        <div class="row g-lg-4 g-3">
                            <div class="col-xl-4 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['clients_name']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="individual_name" value="{{ old('individual_name', $client->individual_name) }}" placeholder="Enter here">
                                @error('individual_name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['national_id']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="national_id" value="{{ old('national_id', $client->national_id) }}" placeholder="Enter here">
                                @error('national_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['mobile_number']->name }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="mobile_number" value="{{ old('mobile_number', $client->mobile_number) }}" placeholder="Enter here">
                                @error('mobile_number')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['address']->name }}</label>
                                <input type="text" class="form-control"  name="address" value="{{ old('address', $client->address) }}" placeholder="Enter here">
                                @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['client_email_address']->name }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="individual_email" value="{{ old('individual_email', $client->individual_email) }}" placeholder="Enter here">
                                @error('individual_email')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12"><hr class="dashed my-1"></div>
                            <div class="col-12">
                                <label class="form-label">{{ $cmsTranslations['documents_delegations']->name }}</label>
                                <input class="form-control" type="file" name="individual_documents">
                                @error('individual_documents')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div id="businessFields" class="d-none">
                        <div class="row g-lg-4 g-3">
                            <div class="col-lg-4 col-md-12">
                                <label class="form-label">{{ $cmsTranslations['company_name']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $client->company_name) }}" placeholder="Enter here">
                                @error('company_name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">{{ $cmsTranslations['unified_number']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="unified_number" value="{{ old('unified_number', $client->unified_number) }}" placeholder="Enter here">
                                @error('unified_number')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">{{ $cmsTranslations['vat_number']->name }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="vat_number" value="{{ old('vat_number', $client->vat_number) }}" placeholder="Enter here">
                                @error('vat_number')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ $cmsTranslations['address']->name }}</label>
                                <input type="text" class="form-control" name="address_business" value="{{ old('address_business', $client->address_business) }}" placeholder="Enter here">
                                @error('address_business')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12"><hr class="dashed my-1"></div>
                            <div class="col-xl-6 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['ceo_name']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ceo_name" value="{{ old('ceo_name', $client->ceo_name) }}" placeholder="Enter here">
                                @error('ceo_name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['ceo_email_address']->name }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="ceo_email" value="{{ old('ceo_email', $client->ceo_email) }}" placeholder="Enter here">
                                @error('ceo_email')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12"><hr class="dashed my-1"></div>
                            <div class="col-lg-4 col-md-12">
                                <label class="form-label">{{ $cmsTranslations['representative_name']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="representative_name" value="{{ old('representative_name', $client->representative_name) }}" placeholder="Enter here">
                                @error('representative_name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">{{ $cmsTranslations['representative_mobile_number']->name }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="representative_mobile" value="{{ old('representative_mobile', $client->representative_mobile) }}" placeholder="Enter here">
                                @error('representative_mobile')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">{{ $cmsTranslations['representative_email_address']->name }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="representative_email" value="{{ old('representative_email', $client->representative_email) }}" placeholder="Enter here">
                                @error('representative_email')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12"><hr class="dashed my-1"></div>
                            <div class="col-lg-4 col-md-12">
                                <label class="form-label">{{ $cmsTranslations['accountant_name']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="accountant_name" value="{{ old('accountant_name', $client->accountant_name) }}" placeholder="Enter here">
                                @error('accountant_name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">{{ $cmsTranslations['accountant_mobile_number']->name }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="accountant_mobile" value="{{ old('accountant_mobile', $client->accountant_mobile) }}" placeholder="Enter here">
                                @error('accountant_mobile')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">{{ $cmsTranslations['accountant_email_address']->name }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="accountant_email" value="{{ old('accountant_email', $client->accountant_email) }}" placeholder="Enter here">
                                @error('accountant_email')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12"><hr class="dashed my-1"></div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['documents']->name }}</label>
                                <input class="form-control" type="file" name="documents">
                                @error('documents')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['company_logo']->name }}</label>
                                <input class="form-control" type="file" name="company_logo">
                                @error('company_logo')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="page-action mt-2">
                <button class="btn btn-big btn-primary" type="submit">{{ $cmsTranslations['save']->name }}</button>
                <a class="btn btn-big btn-secondary btn-cancel" href="{{ url()->previous() }}" type="button">{{ $cmsTranslations['cancel']->name }}</a>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radios = document.querySelectorAll('input[name="client_type"]');
        const individualFields = document.getElementById('individualFields');
        const businessFields = document.getElementById('businessFields');

        // Check edit mode passed from Blade
        const isEditMode = {{ isset($client) ? 'true' : 'false' }};

        // Clear fields inside a container (inputs, textareas, file fields)
        function clearInputs(container) {
            if (isEditMode) return;  // ✅ Do not clear fields in edit mode

            container.querySelectorAll('input, textarea').forEach(field => {
                if (field.type === 'file') {
                    field.value = null;
                } else {
                    field.value = '';
                }
            });
        }

        function toggleClientType(type) {
            if (type === 'individual') {
                individualFields.classList.remove('d-none');
                businessFields.classList.add('d-none');
                clearInputs(businessFields);
            } else {
                businessFields.classList.remove('d-none');
                individualFields.classList.add('d-none');
                clearInputs(individualFields);
            }
        }

        // Set initial state on page load
        const selected = document.querySelector('input[name="client_type"]:checked')?.value || 'individual';
        toggleClientType(selected);

        // Listen to radio change
        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                toggleClientType(this.value);
            });
        });
    });
</script>

@endsection
