@extends('layouts.app')
@section('title', __('View Test'))
@section('content')
    <!-- breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">{{ $cmsTranslations['view_test']->name }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.tests.index') }}" class="link">{{ $cmsTranslations['test_list']->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['view_test']->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row g-lg-4 g-3">
        <div class="col-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <h5 class="mb-lg-4 mb-3">{{ $cmsTranslations['client_details']->name }}</h5>
                    @php
                        $serviceOrder = $test->serviceOrder ?? null;
                    @endphp
                    @if($serviceOrder->client && $serviceOrder->client->client_type === 'individual')
                        <div class="row g-lg-4 g-3">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['clients_name']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->individual_name ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['client_number']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->id ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['mobile_number']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->mobile_number ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['email_address']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->individual_email ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['date_time']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->client->created_at)->format('d M Y, h:i A') }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['employee_number_received']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->national_id ?? '-' }}</h5>
                            </div>
                        </div>
                    @elseif($serviceOrder->client && $serviceOrder->client->client_type === 'business')
                        <div class="row g-lg-4 g-3">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['clients_name']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->company_name ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['client_number']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->id ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['mobile_number']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->accountant_mobile ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['email_address']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->accountant_email ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['date_time']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->client->created_at)->format('d M Y, h:i A') }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['employee_number_received']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->client->unified_number ?? '-' }}</h5>
                            </div>
                        </div>
                    @else
                        <div class="row g-lg-4 g-3">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['client_data_not_found']->name }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <h5 class="mb-lg-4 mb-3">{{ $cmsTranslations['service_order_details']->name }}</h5>
                    <div class="row g-lg-4 g-3">
                        @if($serviceOrder->service_type == 'consultation')
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['consultation_type']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->consultation  ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['delivery_date']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->delivery_date)->format('d M Y')  ?? '-' }}</h5>
                            </div>
                        @else
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['purpose_of_valuation']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->purposeOfValuation->name ?? "-" }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['other_owners']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->has_other_owners ? 'Yes' : 'No' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['how_many']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->how_many  ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['your_percentage']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->ownership_percentage  ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['government_referral']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->government_referral  ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['any_other_use']->name }} </p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->other_use_of_report  ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['delivery_date']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->delivery_date)->format('d M Y')  ?? '-' }}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['comments']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $serviceOrder->comment  ?? '-' }}</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h5>{{ $cmsTranslations['gemstones_jewelry_pc']->name }}</h5>
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion">
                    <!-- Jewelry Type 1 -->
                    @forelse($test->serviceOrder->articles as $index => $item)
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <div class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#JewelryType-{{ $item->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="JewelryType-{{ $item->id }}">
                                    <div class="row g-lg-4 g-3 w-100">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-0 fs-12">{{ $cmsTranslations['jewelry_type']->name }}</p>
                                            <h6 class="mb-0">{{ $item->jewelryType->name ?? '-' }}</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-muted mb-0 fs-12">{{ $cmsTranslations['total_weight']->name }}</p>
                                            <h6 class="mb-0">{{ $item->total_weight }} {{ $item->weightUnit->name ?? '-' }}</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-muted mb-0 fs-12">{{ $cmsTranslations['studded_stones']->name }}</p>
                                            <h6 class="mb-0">{{ $item->studdedStone->name ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="JewelryType-{{ $item->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-lg-5">
                                            <ul class="list-unstyled mb-0 me-lg-5">
                                                @foreach($item->images->where('for_testing', true) as $key => $image)
                                                    <li class="d-flex gap-lg-4 gap-2 align-items-center mb-2 flex-wrap">
                                                        <span class="text-truncate">{{ $cmsTranslations['pictures']->name }} {{ $key + 1}}</span>
                                                        <div class="d-flex gap-2 align-items-center ms-auto">
                                                            <a href="{{ asset('storage/' . $image->image_path) }}" download class="btn btn-sm btn-accent text-white">{{ $cmsTranslations['download']->name }}</a>
                                                            <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $image->image_path) }}')">{{ $cmsTranslations['preview']->name }}</button>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-7">
                                            <ul class="list-unstyled mb-0 label-btn">
                                                @if(!empty($item->article_belonging_file))
                                                    <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                        <p class="mb-0">{{ $cmsTranslations['article_belongings']->name }}:</p>
                                                        <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                            <a href="{{ asset('storage/' . $item->article_belonging_file) }}" download class="btn btn-sm btn-accent text-white">{{ $cmsTranslations['download']->name }}</a>
                                                            <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->article_belonging_file) }}')">{{ $cmsTranslations['preview']->name }}</button>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if(!empty($item->previous_valuation_report))
                                                    <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                        <p class="mb-0">{{ $cmsTranslations['test_previous_valuation_report']->name }}:</p>
                                                        <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                            <a href="{{ asset('storage/' . $item->previous_valuation_report) }}" download class="btn btn-sm btn-accent text-white">{{ $cmsTranslations['download']->name }}</a>
                                                            <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->previous_valuation_report) }}')">{{ $cmsTranslations['preview']->name }}</button>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if(!empty($item->invoice_file))
                                                    <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                        <p class="mb-0">{{ $cmsTranslations['test_invoices_related']->name }}:</p>
                                                        <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                            <a href="{{ asset('storage/' . $item->invoice_file) }}" download class="btn btn-sm btn-accent text-white">{{ $cmsTranslations['download']->name }}</a>
                                                            <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->invoice_file) }}')">{{ $cmsTranslations['preview']->name }}</button>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if(!empty($item->attachment_file))
                                                    <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                        <p class="mb-0 col-12 col-lg-6">{{ $cmsTranslations['attachment']->name }}:</p>
                                                        <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                            <a href="{{ asset('storage/' . $item->attachment_file) }}" download class="btn btn-sm btn-accent text-white">{{ $cmsTranslations['download']->name }}</a>
                                                            <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->attachment_file) }}')">{{ $cmsTranslations['preview']->name }}</button>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['comment']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $item->comment ?? '-' }}</h5>
                                        </div>
                                        <!-- Metal -->
                                        <div class="col-12">
                                            <div class="card brand-bg rounded-4">
                                                <div class="card-body">
                                                    @forelse($item->gjpItemMetal as $mIndex => $metal)
                                                        <ul class="list-unstyled mb-0 row g-lg-4 g-3">
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['precious_metal_type']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $metal?->preciousMetalType?->name ?? '' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['precious_color']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $metal?->preciousColor?->name ?? '' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['stamp']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $metal?->stamp?->name ?? '' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['purity_as_per_test_tesults']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $metal->purity ?? '' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['metal_net_weight']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $metal->metal_net_weight  }} {{ $cmsTranslations['grams']->name }}</h5>
                                                            </li>
                                                        </ul>
                                                        @if(!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @empty
                                                        {{ $cmsTranslations['data_not_found']->name }}
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Gem Stones -->
                                        @forelse($item->gjpItemGemStone as $gIndex => $gem)
                                            <div class="col-12">
                                                <div class="card brand-bg rounded-4">
                                                    <div class="card-body">
                                                        <h5 class="text-secondary mb-lg-4">{{ $gem->stone_type == 'diamond' ? $cmsTranslations['diamond']->name : ($gem->stone_type == 'colored' ? $cmsTranslations['colored_stones']->name : '') }}</h5>
                                                        <ul class="list-unstyled mb-0 row g-lg-4 g-3">
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['number_of_stones']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem->number_of_stones ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['weight']->name }}</p>
                                                                @if($gem->stone_type == 'diamond')
                                                                    <h5 class="fs-18 mb-0">{{ $gem->total_weight ?? '-' }} {{ $cmsTranslations['carat']->name }}</h5>
                                                                @else
                                                                    <h5 class="fs-18 mb-0">{{ $gem->total_weight ?? '-' }} {{ $gem?->totalWeightUnit?->name ?? '-' }}</h5>
                                                                @endif
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['estimated']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->estimated?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['fluorescence']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->fluorescence?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['cut_grade']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->cutGrade?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['plotting']->name }}</p>
                                                                <img src="{{ asset('storage/'.$gem->plotting) }}" height="50px" width="50px" alt="Plotting Image">
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['identification']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->identification?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['color']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->color?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['clarity']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->clarity?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['shape']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->shape?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['comment']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem?->comment?->name ?? '-' }}</h5>
                                                            </li>
                                                            <li class="col-12">
                                                                <p class="text-muted mb-2">{{ $cmsTranslations['internal_comments']->name }}</p>
                                                                <h5 class="fs-18 mb-0">{{ $gem->internal_comment ?? '-' }}</h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning">{{ $cmsTranslations['data_not_found']->name }}</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="page-action mt-2">
                <a href="{{ route('admin.tests.edit', $test->id) }}" class="btn btn-big btn-accent text-white">{{ $cmsTranslations['edit']->name }}</a>
                <a href="{{ route('admin.tests.index') }}" class="btn btn-big btn-secondary btn-cancel">{{ $cmsTranslations['cancel']->name }}</a>
            </div>
        </div>
    </div>
@endsection