@extends('layouts.app')
@section('title', __('Create Service Order'))
@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['create_service_order']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.service-orders.index') }}" class="link">{{ $cmsTranslations['front_desk']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['create_service_order']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<form action="{{ route('admin.service-orders.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @include('admin.service_orders.form', [
        'clients' => $clients ?? [],
        'jewelryTypes' => $jewelryTypes ?? [],
        'studdedStones' => $studdedStones ?? [],
        'articles' => $articles ?? [],
        'order' => $order ?? null
    ])
</form>
@endsection
