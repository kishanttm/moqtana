@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<!-- breadcrumb -->
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['dashboard']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['dashboard']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
@endsection