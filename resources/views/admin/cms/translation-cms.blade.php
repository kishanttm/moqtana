@extends('layouts.app')

@section('title', __('Translation CMS'))

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['translation_cms']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['translation_cms']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row g-lg-4 g-3">
    <form action="{{ route('admin.translations-cms.store') }}" method="POST">
            @csrf
        <div class="col-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="row g-lg-3 g-2">
                        @foreach ($translations as $index => $item)
                            <div class="col-md-4 col-sm-12 d-flex align-items-center">
                                <span>{{ $item->name_en }}</span>
                                <input type="hidden" name="translations[{{ $index }}][id]" value="{{ $item->id }}">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label class="form-label">English <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter here" name="translations[{{ $index }}][name_en]" value="{{ $item->name_en }}">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                                <label class="form-label">Arabic</label>
                                <input type="text" class="form-control" placeholder="Enter here" name="translations[{{ $index }}][name_ar]" value="{{ $item->name_ar }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="page-action mt-2">
                <button class="btn btn-big btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-big btn-secondary btn-cancel">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
