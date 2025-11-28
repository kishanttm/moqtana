@extends('layouts.app')

@section('title', __('Contract CMS'))

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">{{ $cmsTranslations['contract_cms']->name }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['contract_cms']->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="{{ route('admin.contract.cms.store') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h5 class="fs-18 fw-bold">{{ $cmsTranslations['contract_cms_english']->name }} <span class="text-danger">*</span></h5>
                        <div id="editor-container">
                            <textarea id="editorEnglish" name="contract_en">{{ old('contract_en', $contract->contract_en ?? '') }}</textarea>
                        </div>
                        @error('contract_en')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h5 class="fs-18 fw-bold">{{ $cmsTranslations['contract_cms_arabic']->name }} <span class="text-danger">*</span></h5>
                        <div id="editor-container">
                            <textarea id="editorArabic" name="contract_ar">{{ old('contract_ar', $contract->contract_ar ?? '') }}</textarea>
                        </div>
                        @error('contract_ar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-big btn-primary">{{ $cmsTranslations['save']->name }}</button>
                <a href="{{ route('dashboard') }}" class="btn btn-big btn-secondary">{{ $cmsTranslations['cancel']->name }}</a>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#editorEnglish'), {
            // Optional: customize toolbar or plugins
        })
        .then(editor => {
            // Ensure editable area grows
            editor.ui.view.editable.element.style.height = '100%';
        })
        .catch(error => {
            console.error(error);
        });
        
        ClassicEditor
        .create(document.querySelector('#editorArabic'), {
            // Optional: customize toolbar or plugins
        })
        .then(editor => {
            // Ensure editable area grows
            editor.ui.view.editable.element.style.height = '100%';
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    @endsection