@extends('layouts.app')
@section('title', __('Edit Test'))
@section('content')
    <!-- breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">{{ $cmsTranslations['edit_test']->name }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.tests.index') }}" class="link">{{ $cmsTranslations['test_list']->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $test->order_number }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row g-lg-4 g-3">
        <div class="col-12">
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion">
                    <!-- Client Details -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ClientDetails" aria-expanded="true" aria-controls="ClientDetails">
                                <h5 class="mb-0 text-secondary">{{ $cmsTranslations['client_details']->name }}</h5>
                            </div>
                        </div>
                        <div id="ClientDetails" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @php
                                    $serviceOrder = $test->serviceOrder;
                                @endphp
                                @if($serviceOrder->client && $serviceOrder->client->client_type === 'individual')
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['clients_name']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->individual_name ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['client_number']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->id ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['mobile_number']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->mobile_number ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['email_address']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->individual_email ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['date_time']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->client->created_at)->format('d M Y, h:i A') }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['employee_number_received']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->national_id ?? '-' }}</h5>
                                        </div>
                                    </div>
                                @elseif($serviceOrder->client && $serviceOrder->client->client_type === 'business')
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['clients_name']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->company_name ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['client_number']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->id ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['mobile_number']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->accountant_mobile ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['email_address']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ $serviceOrder->client->accountant_email ?? '-' }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['date_time']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->client->created_at)->format('d M Y, h:i A') }}</h5>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
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
                        <!-- accordion 2 -->
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ServiceOrderDetails" aria-expanded="false" aria-controls="ServiceOrderDetails">
                                    <h5 class="mb-0 text-secondary">{{ $cmsTranslations['service_order_details']->name }}</h5>
                                </div>
                            </div>
                            <div id="ServiceOrderDetails" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['choose_service']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ ucfirst($serviceOrder->service_type) ?? '-' }}</h5>
                                        </div>
                                        @if($serviceOrder->service_type == 'consultation')
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['consultation_type']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->consultation  ?? '-' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['delivery_date']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->delivery_date)->format('d M Y')  ?? '-' }}</h5>
                                            </div>
                                        @else
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['purpose_of_valuation']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->purposeOfValuation->name ?? "-" }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['other_owners']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->has_other_owners ? 'Yes' : 'No' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['how_many']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->how_many  ?? '-' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['your_percentage']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->ownership_percentage  ?? '-' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['government_referral']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->government_referral  ?? '-' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['any_other_use']->name }} </p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->other_use_of_report  ?? '-' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['delivery_date']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->delivery_date)->format('d M Y')  ?? '-' }}</h5>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                                <p class="text-muted mb-2">{{ $cmsTranslations['comment']->name }}</p>
                                                <h5 class="fs-18 mb-0">{{ $serviceOrder->comment  ?? '-' }}</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Articles Section -->
        <div class="col-12">
            <h5>{{ $cmsTranslations['gemstones_jewelry_pc']->name }}</h5>
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion" id="articlesAccordion">
                    @forelse($test->serviceOrder->articles as $index => $item)
                        <form action="{{ route('admin.tests.update', $test->id) }}" method="POST" id="testForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                <h6 class="mb-0">{{ $item->total_weight }} {{ $item->weightUnit->name ?? '' }}</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted mb-0 fs-12">{{ $cmsTranslations['studded_stones']->name }}</p>
                                                <h6 class="mb-0">{{ $item->studdedStone->name ?? '-' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="JewelryType-{{ $item->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#articlesAccordion">
                                    <div class="accordion-body">
                                        <div class="row g-lg-4 g-3">
                                            <!-- Images Section -->
                                            <div class="col-lg-5">
                                                @if($item->images->where('for_testing', true)->count() > 0)
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
                                                @endif
                                            </div>
                                            <div class="col-lg-7">
                                                <ul class="list-unstyled mb-0">
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

                                            <!-- Metal Section -->
                                            <div class="col-12">
                                                <h6 class="mb-3">{{ $cmsTranslations['metals']->name }}</h6>
                                                <div class="metalContainer_{{ $item->id }}">
                                                    @php
                                                        $itemMetals = $test->metals->filter(fn($m) => $m->gjp_item_id == $item->id);
                                                        $metalCount = $itemMetals->count();
                                                        $oldMetals = old('article.'.$index.'.metals', []);

                                                        $itemOldMetals = [];
                                                        if (!empty($oldMetals)) {
                                                            foreach ($oldMetals as $oIndex => $oMetal) {
                                                                if (isset($oMetal['gjp_item_id']) && $oMetal['gjp_item_id'] == $item->id) {
                                                                    $itemOldMetals[$oIndex] = $oMetal;
                                                                }
                                                            }
                                                        }
                                                        $renderMetals = !empty($itemOldMetals) ? $itemOldMetals : $itemMetals;
                                                        // dd($renderMetals);
                                                    @endphp
                                                    @forelse($renderMetals as $mIndex => $metal)
                                                        <input type="hidden" name="article[{{ $index }}][metals][{{ $mIndex }}][id]" value="{{ $metal->id ?? ""}}">
                                                        <div class="d-flex align-items-start mb-lg-4 mb-3 metal-row" data-item-id="{{ $item->id }}" data-metal-index="{{ $mIndex }}">
                                                            <div class="card brand-bg rounded-4 flex-grow-1">
                                                                <div class="card-body">
                                                                    <div class="row g-lg-4 g-3">
                                                                        <input type="hidden" name="article[{{ $index }}][metals][{{ $mIndex }}][gjp_item_id]" value="{{ $item->id }}">
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['precious_metal_type']->name }} <span class="text-danger">*</span></label>
                                                                            <select class="form-select @error('article.'.$index.'.metals.'.$mIndex.'.precious_metal_type_id') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][precious_metal_type_id]">
                                                                                <option value="">Select...</option>
                                                                                @foreach($metalTypes as $type)
                                                                                <option value="{{ $type->id }}" @if(data_get($metal, 'precious_metal_type_id') == $type->id || old('article.'.$index.'.metals.'.$mIndex.'.precious_metal_type_id') == $type->id) selected @endif>{{ $type->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('article.'.$index.'.metals.'.$mIndex.'.precious_metal_type_id')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['precious_color']->name }} <span class="text-danger">*</span></label>
                                                                            <select class="form-select @error('article.'.$index.'.metals.'.$mIndex.'.precious_color_id') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][precious_color_id]">
                                                                                <option value="">Select...</option>
                                                                                @foreach($colors as $color)
                                                                                <option value="{{ $color->id }}" @if(data_get($metal, 'precious_color_id') == $color->id || old('article.'.$index.'.metals.'.$mIndex.'.precious_color_id') == $color->id) selected @endif>{{ $color->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('article.'.$index.'.metals.'.$mIndex.'.precious_color_id')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['stamp']->name }} <span class="text-danger">*</span></label>
                                                                            <select class="form-select @error('article.'.$index.'.metals.'.$mIndex.'.stamp_id') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][stamp_id]">
                                                                                <option value="">Select...</option>
                                                                                @foreach($stamps as $stamp)
                                                                                <option value="{{ $stamp->id }}" @if(data_get($metal, 'stamp_id') == $stamp->id || old('article.'.$index.'.metals.'.$mIndex.'.stamp_id') == $stamp->id) selected @endif>{{ $stamp->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('article.'.$index.'.metals.'.$mIndex.'.stamp_id')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['purity']->name }} <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control @error('article.'.$index.'.metals.'.$mIndex.'.purity') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][purity]" placeholder="Enter purity" value="{{ old('article.'.$index.'.metals.'.$mIndex.'.purity') ?? data_get($metal, 'purity') ?? '' }}">
                                                                            @error('article.'.$index.'.metals.'.$mIndex.'.purity')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-12">
                                                                            <label class="form-label">{{ $cmsTranslations['metal_net_weight']->name }} <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control @error('article.'.$index.'.metals.'.$mIndex.'.metal_net_weight') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][metal_net_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.metals.'.$mIndex.'.metal_net_weight') ?? data_get($metal, 'metal_net_weight') ?? '' }}">
                                                                                <span class="input-group-text">{{ $cmsTranslations['grams']->name }}</span>
                                                                                @error('article.'.$index.'.metals.'.$mIndex.'.metal_net_weight')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn p-0 delete-metal-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Metal">
                                                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M14.688 14.688L35.3119 35.3119"/>
                                                                    <path d="M14.688 35.312L35.3119 14.6881"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @empty
                                                        <div class="d-flex align-items-start mb-lg-4 mb-3 metal-row" data-item-id="{{ $item->id }}" data-metal-index="0">
                                                            <div class="card brand-bg rounded-4 flex-grow-1">
                                                                <div class="card-body">
                                                                    <div class="row g-lg-4 g-3">
                                                                        <input type="hidden" name="article[{{ $index }}][metals][0][gjp_item_id]" value="{{ $item->id }}">
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['precious_metal_type']->name }} <span class="text-danger">*</span></label>
                                                                            <select class="form-select @error('article.'.$index.'.metals.0.precious_metal_type_id') is-invalid @enderror" name="article[{{ $index }}][metals][0][precious_metal_type_id]">
                                                                                <option value="">Select...</option>
                                                                                @foreach($metalTypes as $type)
                                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('article.'.$index.'.metals.0.precious_metal_type_id')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['precious_color']->name }} <span class="text-danger">*</span></label>
                                                                            <select class="form-select @error('article.'.$index.'.metals.0.precious_color_id') is-invalid @enderror" name="article[{{ $index }}][metals][0][precious_color_id]">
                                                                                <option value="">Select...</option>
                                                                                @foreach($colors as $color)
                                                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('article.'.$index.'.metals.0.precious_color_id')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['stamp']->name }} <span class="text-danger">*</span></label>
                                                                            <select class="form-select @error('article.'.$index.'.metals.0.stamp_id') is-invalid @enderror" name="article[{{ $index }}][metals][0][stamp_id]">
                                                                                <option value="">Select...</option>
                                                                                @foreach($stamps as $stamp)
                                                                                <option value="{{ $stamp->id }}">{{ $stamp->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('article.'.$index.'.metals.0.stamp_id')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                                            <label class="form-label">{{ $cmsTranslations['purity']->name }}</label>
                                                                            <input type="text" class="form-control @error('article.'.$index.'.metals.0.purity') is-invalid @enderror" name="article[{{ $index }}][metals][0][purity]" placeholder="Enter purity" value="{{ old('article.'.$index.'.metals.0.purity') ?? '' }}">
                                                                            @error('article.'.$index.'.metals.0.purity')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-12">
                                                                            <label class="form-label">{{ $cmsTranslations['metal_net_weight']->name }} <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control @error('article.'.$index.'.metals.0.metal_net_weight') is-invalid @enderror" name="article[{{ $index }}][metals][0][metal_net_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.metals.0.metal_net_weight') ?? '' }}">
                                                                                <span class="input-group-text">{{ $cmsTranslations['grams']->name }}</span>
                                                                                @error('article.'.$index.'.metals.0.metal_net_weight')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn p-0 delete-metal-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Metal" style="display:none;">
                                                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M14.688 14.688L35.3119 35.3119"/>
                                                                    <path d="M14.688 35.312L35.3119 14.6881"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endforelse
                                                </div>
                                                <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0 add-metal-btn" data-item-id="{{ $item->id }}" data-item-unit={{ $item->weightUnit->name ?? '' }} data-item-index={{ $index ?? '' }}>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 5V19"/>
                                                        <path d="M5 12H19"/>
                                                    </svg>
                                                    {{ $cmsTranslations['add_new_metal']->name }}
                                                </button>
                                            </div>

                                            <!-- Gem Stone Section -->
                                            <div class="col-12">
                                                <div class="gemStoneContainer_{{ $item->id }}">
                                                    @php
                                                        $itemGemstones = $test->gemStones->filter(fn($g) => $g->gjp_item_id == $item->id);
                                                        $gemCount = $itemGemstones->count();
                                                        $oldGemstones = old('article.'.$index.'.gem_stones', []);
                                                        $itemOldGemstones = [];
                                                        if (!empty($oldGemstones)) {
                                                            foreach ($oldGemstones as $oIndex => $oGem) {
                                                                if (isset($oGem['gjp_item_id']) && $oGem['gjp_item_id'] == $item->id) {
                                                                    $itemOldGemstones[$oIndex] = $oGem;
                                                                }
                                                            }
                                                        }
                                                        $renderGemstones = !empty($itemOldGemstones) ? $itemOldGemstones : $itemGemstones;
                                                    @endphp
                                                    {{-- {{ dd($renderGemstones) }} --}}
                                                    @forelse($renderGemstones as $gIndex => $gem)
                                                        <input type="hidden" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][id]" value="{{ $gem->id ?? "" }}">
                                                        <div class="d-flex align-items-start mb-lg-4 mb-3 gemstone-row" data-item-id="{{ $item->id }}" data-gemstone-index="{{ $gIndex }}">
                                                            <div class="card brand-bg rounded-4 flex-grow-1">
                                                                <div class="card-body">
                                                                    <p class="mb-2 form-label">{{ $cmsTranslations['choose_client_type']->name }}</p>
                                                                    @php
                                                                        $renderedStoneType = old('article.'.$index.'.gem_stones.'.$gIndex.'.stone_type') ?? data_get($gem, 'stone_type') ?? 'diamond';
                                                                    @endphp
                                                                    <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" role="tablist" data-gemstone-tabs="{{ $index.'-'.$gIndex }}">
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link @if($renderedStoneType == 'diamond') active @endif" data-bs-toggle="pill" data-bs-target="#Diamond-{{ $index.'-'.$gIndex }}" type="button" role="tab" data-stone-type="diamond">{{ $cmsTranslations['diamond']->name }}</button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link @if($renderedStoneType == 'colored') active @endif" data-bs-toggle="pill" data-bs-target="#ColoredStones-{{ $index.'-'.$gIndex }}" type="button" role="tab" data-stone-type="colored">{{ $cmsTranslations['colored_stones']->name }}</button>
                                                                        </li>
                                                                    </ul>
                                                                    <input type="hidden" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][stone_type]" class="stone-type-input" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.stone_type') ?? data_get($gem, 'stone_type') ?? 'diamond' }}">
                                                                    <input type="hidden" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][gjp_item_id]" value="{{ $item->id }}">
                                                                    <div class="tab-content" id="pills-tabContent">
                                                                        <div class="tab-pane fade @if((old('article.'.$index.'.gem_stones.'.$gIndex.'.stone_type') ?? (data_get($gem, 'stone_type') ?? 'diamond')) == 'diamond') show active @endif" id="Diamond-{{ $index.'-'.$gIndex }}" role="tabpanel">
                                                                            <div class="row g-lg-4 g-3">
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['number_of_stones']->name }} <span class="text-danger">*</span></label>
                                                                                    <input type="number" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][number_of_stones]" placeholder="Enter number" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones') ?? data_get($gem, 'number_of_stones') ?? '' }}">
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['weight']->name }} <span class="text-danger">*</span></label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][total_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight') ?? data_get($gem, 'total_weight') ?? '' }}">
                                                                                        <span class="input-group-text">{{ $cmsTranslations['carat']->name }} </span>
                                                                                        @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight')
                                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['measurement']->name }} <span class="text-danger">*</span></label>
                                                                                    <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][measurement]" placeholder="Enter measurement" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.measurement') ?? data_get($gem, 'measurement') ?? '' }}">
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['shape']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.shape_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][shape_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($shapes as $shape)
                                                                                        <option value="{{ $shape->id }}" @if(data_get($gem, 'shape_id') == $shape->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.shape_id') == $shape->id) selected @endif>{{ $shape->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.shape_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['cut_grade']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.cut_grade_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][cut_grade_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($cutGrades as $grade)
                                                                                        <option value="{{ $grade->id }}" @if(data_get($gem, 'cut_grade_id') == $grade->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.cut_grade_id') == $grade->id) selected @endif>{{ $grade->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.cut_grade_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['color']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][color_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($gemColors as $gemColor)
                                                                                        <option value="{{ $gemColor->id }}" @if(data_get($gem, 'color_id') == $gemColor->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.color_id') == $gemColor->id) selected @endif>{{ $gemColor->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['fluorescence']->name }} <span class="text-danger">*</span></label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.fluorescence_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][fluorescence_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($fluorescences as $fluorescence)
                                                                                        <option value="{{ $fluorescence->id }}" @if(data_get($gem, 'fluorescence_id') == $fluorescence->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.fluorescence_id') == $fluorescence->id) selected @endif>{{ $fluorescence->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.fluorescence_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['clarity']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][clarity_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($clarities as $clarity)
                                                                                        <option value="{{ $clarity->id }}" @if(data_get($gem, 'clarity_id') == $clarity->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id') == $clarity->id) selected @endif>{{ $clarity->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['plotting']->name }}</label>
                                                                                    <input type="file" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.plotting') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][plotting]">
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.plotting')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['estimated']->name }} <span class="text-danger">*</span></label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][estimated_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($estimateds as $estimated)
                                                                                        <option value="{{ $estimated->id }}" @if(data_get($gem, 'estimated_id') == $estimated->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id') == $estimated->id) selected @endif>{{ $estimated->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['identification']->name }} <span class="text-danger">*</span></label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][identification_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($identifications as $identification)
                                                                                        <option value="{{ $identification->id }}" @if(data_get($gem, 'identification_id') == $identification->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id') == $identification->id) selected @endif>{{ $identification->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.comment_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][comment_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($comments as $comment)
                                                                                        <option value="{{ $comment->id }}" @if(data_get($gem, 'comment_id') == $comment->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.comment_id') == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.comment_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <label class="form-label">{{ $cmsTranslations['internal_comments']->name }}</label>
                                                                                    <textarea class="form-control" placeholder="Enter here" rows="3" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][internal_comment]"></textarea>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.internal_comment')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade @if((old('article.'.$index.'.gem_stones.'.$gIndex.'.stone_type') ?? (data_get($gem, 'stone_type') ?? '')) == 'colored') show active @endif" id="ColoredStones-{{ $index.'-'.$gIndex }}" role="tabpanel">
                                                                            <div class="row g-lg-4 g-3">
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['number_of_stones']->name }} <span class="text-danger">*</span></label>
                                                                                    <input type="number" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][number_of_stones]" placeholder="Enter number" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones') ?? data_get($gem, 'number_of_stones') ?? '' }}">
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['measurement']->name }} <span class="text-danger">*</span></label>
                                                                                    <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][measurement]" placeholder="Enter measurement" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.measurement') ?? data_get($gem, 'measurement') ?? '' }}">
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['weight']->name }} <span class="text-danger">*</span></label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][total_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight') ?? data_get($gem, 'total_weight') ?? '' }}">
                                                                                        <select class="form-select" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][total_weight_unit_id]">
                                                                                            @foreach($units as $unit)
                                                                                                <option value="{{ $unit->id }}" @if(isset($gem['total_weight_unit_id']) && $gem['total_weight_unit_id'] == $unit->id) selected @endif>{{ $unit->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight')
                                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['weight_per_stone']->name }} <span class="text-danger">*</span></label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.weight_per_stone') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][weight_per_stone]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.'.$gIndex.'.weight_per_stone') ?? data_get($gem, 'weight_per_stone') ?? '' }}">
                                                                                        <select class="form-select" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][weight_stone_unit_id]">
                                                                                            @foreach($units as $unit)
                                                                                                <option value="{{ $unit->id }}" @if(isset($gem['weight_stone_unit_id']) && $gem['weight_stone_unit_id'] == $unit->id) selected @endif>{{ $unit->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('article.'.$index.'.gem_stones.'.$gIndex.'.weight_per_stone')
                                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['estimated']->name }} <span class="text-danger">*</span></label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][estimated_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($estimateds as $estimated)
                                                                                        <option value="{{ $estimated->id }}" @if(data_get($gem, 'estimated_id') == $estimated->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id') == $estimated->id) selected @endif>{{ $estimated->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['identification']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][identification_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($identifications as $identification)
                                                                                            <option value="{{ $identification->id }}" @if(data_get($gem, 'identification_id') == $identification->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id') == $identification->id) selected @endif>{{ $identification->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['group']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.group_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][group_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($groups as $group)
                                                                                            <option value="{{ $group->id }}" @if(data_get($gem, 'group_id') == $group->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.group_id') == $group->id) selected @endif>{{ $group->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.group_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['species']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.species_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][species_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($species as $sp)
                                                                                            <option value="{{ $sp->id }}" @if(data_get($gem, 'species_id') == $sp->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.species_id') == $sp->id) selected @endif>{{ $sp->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.species_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['variety']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.variety_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][variety_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($varieties as $variety)
                                                                                        <option value="{{ $variety->id }}" @if(data_get($gem, 'variety_id') == $variety->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.variety_id') == $variety->id) selected @endif>{{ $variety->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.variety_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['color']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][color_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($gemColors as $gemColor)
                                                                                        <option value="{{ $gemColor->id }}" @if(data_get($gem, 'color_id') == $gemColor->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.color_id') == $gemColor->id) selected @endif>{{ $gemColor->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['clarity']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][clarity_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($clarities as $clarity)
                                                                                            <option value="{{ $clarity->id }}" @if(data_get($gem, 'clarity_id') == $clarity->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id') == $clarity->id) selected @endif>{{ $clarity->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['transparency']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.transparency_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][transparency_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($transparencies as $transparency)
                                                                                            <option value="{{ $transparency->id }}" @if(data_get($gem, 'transparency_id') == $transparency->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.transparency_id') == $transparency->id) selected @endif>{{ $transparency->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.transparency_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['luster']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.luster_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][luster_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($lusters as $luster)
                                                                                            <option value="{{ $luster->id }}" @if(data_get($gem, 'luster_id') == $luster->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.luster_id') == $luster->id) selected @endif>{{ $luster->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.luster_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['phenomena']->name }}</label>
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.phenomena_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][phenomena_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($phenomena as $phen)
                                                                                            <option value="{{ $phen->id }}" @if(data_get($gem, 'phenomena_id') == $phen->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.phenomena_id') == $phen->id) selected @endif>{{ $phen->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.phenomena_id')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-xl-4 col-lg-6">
                                                                                    <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                                                                    <select class="form-select" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][comment_id]">
                                                                                        <option value="">Select...</option>
                                                                                        @foreach($comments as $comment)
                                                                                        <option value="{{ $comment->id }}" @if(data_get($gem, 'comment_id') == $comment->id || old('article.'.$index.'.gem_stones.'.$gIndex.'.comment_id') == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <label class="form-label">{{ $cmsTranslations['internal_comments']->name }}</label>
                                                                                    <textarea class="form-control" placeholder="Enter here" rows="3" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][internal_comment]"></textarea>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.internal_comment')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn p-0 delete-gemstone-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Gem Stone">
                                                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M14.688 14.688L35.3119 35.3119"/>
                                                                    <path d="M14.688 35.312L35.3119 14.6881"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @empty
                                                        <!-- default first gemstone row -->
                                                        <div class="d-flex align-items-start mb-lg-4 mb-3 gemstone-row" data-item-id="{{ $item->id }}" data-gemstone-index="0">
                                                            <div class="card brand-bg rounded-4 flex-grow-1">
                                                                <div class="card-body">
                                                                    <p class="mb-2 form-label">{{ $cmsTranslations['choose_client_type']->name }}</p>
                                                                    <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" role="tablist" data-gemstone-tabs="{{ $index.'-0' }}">
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="{{ '#Diamond-'.$index.'-0' }}" type="button" role="tab" data-stone-type="diamond">{{ $cmsTranslations['diamond']->name }}</button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="{{ '#ColoredStones-'.$index.'-0' }}" type="button" role="tab" data-stone-type="colored">{{ $cmsTranslations['colored_stones']->name }}</button>
                                                                        </li>
                                                                    </ul>
                                                                    <input type="hidden" name="article[{{ $index }}][gem_stones][0][stone_type]" class="stone-type-input" value="diamond">
                                                                    <input type="hidden" name="article[{{ $index }}][gem_stones][0][gjp_item_id]" value="{{ $item->id }}">
                                                                    <div class="tab-content" id="pills-tabContent">
                                                                    <!-- Diamond Tab -->
                                                                    <div class="tab-pane fade show active" id="{{ 'Diamond-'.$index.'-0' }}" role="tabpanel">
                                                                        <div class="row g-lg-4 g-3">
                                                                            
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['number_of_stones']->name }} <span class="text-danger">*</span></label>
                                                                                <input type="number" class="form-control" name="article[{{ $index }}][gem_stones][0][number_of_stones]" placeholder="Enter number" value="{{ old('article.'.$index.'.gem_stones.0.number_of_stones') }}">
                                                                                @error('article.'.$index.'.gem_stones.0.number_of_stones')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['weight']->name }} <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" name="article[{{ $index }}][gem_stones][0][total_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.0.total_weight') }}">
                                                                                    <span class="input-group-text">{{ $cmsTranslations['carat']->name }}</span>
                                                                                    @error('article.'.$index.'.gem_stones.0.total_weight')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['measurement']->name }} <span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control" name="article[{{ $index }}][gem_stones][0][measurement]" placeholder="Enter measurement" value="{{ old('article.'.$index.'.gem_stones.0.measurement') }}">
                                                                                @error('article.'.$index.'.gem_stones.0.measurement')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['shape']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][shape_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($shapes as $shape)
                                                                                    <option value="{{ $shape->id }}" @if(old('article.'.$index.'.gem_stones.0.shape_id') == $shape->id) selected @endif>{{ $shape->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.shape_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['cut_grade']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][cut_grade_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($cutGrades as $grade)
                                                                                    <option value="{{ $grade->id }}" @if(old('article.'.$index.'.gem_stones.0.cut_grade_id') == $grade->id) selected @endif>{{ $grade->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.cut_grade_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['color']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][color_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($gemColors as $gemColor)
                                                                                    <option value="{{ $gemColor->id }}" @if(old('article.'.$index.'.gem_stones.0.color_id') == $gemColor->id) selected @endif>{{ $gemColor->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.color_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['fluorescence']->name }} <span class="text-danger">*</span></label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][fluorescence_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($fluorescences as $fluorescence)
                                                                                        <option value="{{ $fluorescence->id }}" @if(old('article.'.$index.'.gem_stones.0.fluorescence_id') == $fluorescence->id) selected @endif>{{ $fluorescence->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.fluorescence_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['clarity']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][clarity_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($clarities as $clarity)
                                                                                        <option value="{{ $clarity->id }}" @if(old('article.'.$index.'.gem_stones.0.clarity_id') == $clarity->id) selected @endif>{{ $clarity->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.clarity_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['plotting']->name }}</label>
                                                                                <input type="file" class="form-control" name="article[{{ $index }}][gem_stones][0][plotting]" {{ old('article.'.$index.'.gem_stones.0.plotting') }}>
                                                                                @error('article.'.$index.'.gem_stones.0.plotting')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['estimated']->name }} <span class="text-danger">*</span></label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][estimated_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($estimateds as $estimated)
                                                                                        <option value="{{ $estimated->id }}" @if(old('article.'.$index.'.gem_stones.0.estimated_id') == $estimated->id) selected @endif>{{ $estimated->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.estimated_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['identification']->name }} <span class="text-danger">*</span></label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][identification_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($identifications as $identification)
                                                                                        <option value="{{ $identification->id }}" @if(old('article.'.$index.'.gem_stones.0.identification_id') == $identification->id) selected @endif>{{ $identification->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.identification_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][comment_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($comments as $comment)
                                                                                    <option value="{{ $comment->id }}" @if(old('article.'.$index.'.gem_stones.0.comment_id') == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.comment_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label class="form-label">{{ $cmsTranslations['internal_comments']->name }}</label>
                                                                                <textarea class="form-control" placeholder="Enter here" rows="3" name="article[{{ $index }}][gem_stones][0][internal_comment]"></textarea>
                                                                                @error('article.'.$index.'.gem_stones.0.internal_comment')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Colored Stones Tab -->
                                                                    <div class="tab-pane fade" id="{{ 'ColoredStones-'.$index.'-0' }}" role="tabpanel">
                                                                        <div class="row g-lg-4 g-3">
                                                                            {{-- <input type="hidden" name="article[{{ $index }}][gem_stones][0][gjp_item_id]" value="{{ old('article.'.$index.'.gem_stones.0.gjp_item_id') }}"> --}}
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['number_of_stones']->name }} <span class="text-danger">*</span></label>
                                                                                <input type="number" class="form-control" name="article[{{ $index }}][gem_stones][0][number_of_stones]" placeholder="Enter number" value={{ old('article.'.$index.'.gem_stones.0.number_of_stones') }}>
                                                                                @error('article.'.$index.'.gem_stones.0.number_of_stones')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['measurement']->name }} <span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control" name="article[{{ $index }}][gem_stones][0][measurement]" placeholder="Enter measurement" value="{{ old('article.'.$index.'.gem_stones.0.measurement') }}">
                                                                                @error('article.'.$index.'.gem_stones.0.measurement')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['weight']->name }} <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" name="article[{{ $index }}][gem_stones][0][total_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.0.total_weight') }}">
                                                                                    <select class="form-select" name="article[{{ $index }}][gem_stones][0][total_weight_unit_id]">
                                                                                        @foreach($units as $unit)
                                                                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.0.total_weight')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['weight_per_stone']->name }} <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" name="article[{{ $index }}][gem_stones][0][weight_per_stone]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.0.weight_per_stone') }}">
                                                                                    <select class="form-select" name="article[{{ $index }}][gem_stones][0][weight_stone_unit_id]">
                                                                                        @foreach($units as $unit)
                                                                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('article.'.$index.'.gem_stones.0.weight_per_stone')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['estimated']->name }} <span class="text-danger">*</span></label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][estimated_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($estimateds as $estimated)
                                                                                    <option value="{{ $estimated->id }}" @if(old('article.'.$index.'.gem_stones.0.estimated_id') == $estimated->id) selected @endif>{{ $estimated->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.estimated_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['identification']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][identification_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($identifications as $identification)
                                                                                    <option value="{{ $identification->id }}" @if(old('article.'.$index.'.gem_stones.0.identification_id') == $identification->id) selected @endif>{{ $identification->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.identification_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['group']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][group_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($groups as $group)
                                                                                    <option value="{{ $group->id }}" @if(old('article.'.$index.'.gem_stones.0.group_id') == $group->id) selected @endif>{{ $group->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.group_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['species']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][species_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($species as $sp)
                                                                                    <option value="{{ $sp->id }}" @if(old('article.'.$index.'.gem_stones.0.species_id') == $sp->id) selected @endif>{{ $sp->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.species_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['variety']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][variety_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($varieties as $variety)
                                                                                    <option value="{{ $variety->id }}" @if(old('article.'.$index.'.gem_stones.0.variety_id') == $variety->id) selected @endif>{{ $variety->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.variety_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['color']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][color_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($gemColors as $gemColor)
                                                                                    <option value="{{ $gemColor->id }}" @if(old('article.'.$index.'.gem_stones.0.color_id') == $gemColor->id) selected @endif>{{ $gemColor->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.color_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['clarity']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][clarity_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($clarities as $clarity)
                                                                                    <option value="{{ $clarity->id }}" @if(old('article.'.$index.'.gem_stones.0.clarity_id') == $clarity->id) selected @endif>{{ $clarity->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.clarity_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['transparency']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][transparency_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($transparencies as $transparency)
                                                                                    <option value="{{ $transparency->id }}" @if(old('article.'.$index.'.gem_stones.0.transparency_id') == $transparency->id) selected @endif>{{ $transparency->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.transparency_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['luster']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][luster_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($lusters as $luster)
                                                                                    <option value="{{ $luster->id }}" @if(old('article.'.$index.'.gem_stones.0.luster_id') == $luster->id) selected @endif>{{ $luster->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.luster_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['phenomena']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][phenomena_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($phenomena as $phen)
                                                                                    <option value="{{ $phen->id }}" @if(old('article.'.$index.'.gem_stones.0.phenomena_id') == $phen->id) selected @endif>{{ $phen->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.phenomena_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                                                                <select class="form-select" name="article[{{ $index }}][gem_stones][0][comment_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($comments as $comment)
                                                                                    <option value="{{ $comment->id }}" @if(old('article.'.$index.'.gem_stones.0.comment_id') == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.0.comment_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label class="form-label">{{ $cmsTranslations['internal_comments']->name }}</label>
                                                                                <textarea class="form-control" placeholder="Enter here" rows="3" name="article[{{ $index }}][gem_stones][0][internal_comment]"></textarea>
                                                                                @error('article.'.$index.'.gem_stones.0.internal_comment')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn p-0 delete-gemstone-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Gem Stone" style="display:none;">
                                                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M14.688 14.688L35.3119 35.3119"/>
                                                                    <path d="M14.688 35.312L35.3119 14.6881"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endforelse
                                                </div>
                                                <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0 add-gemstone-btn" data-item-id="{{ $item->id }}" data-item-unit={{ $item->weightUnit->name ?? '' }}  data-item-index={{ $index ?? '' }}>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 5V19"/>
                                                        <path d="M5 12H19"/>
                                                    </svg>
                                                    {{ $cmsTranslations['add_new_gem_stone']->name }}
                                                </button>
                                            </div>
                                            <div class="col-12">
                                                <div class="page-action mt-2">
                                                    <button type="submit" class="btn btn-big btn-primary">{{ $cmsTranslations['save']->name }}</button>
                                                    <a href="{{ route('admin.tests.index') }}" class="btn btn-big btn-secondary"> {{ $cmsTranslations['cancel']->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Buttons -->
                                </div>
                            </div>
                        </form>
                    @empty
                        <div class="alert alert-warning">{{ $cmsTranslations['data_not_found']->name }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let metalRowIndex = {};
    let gemstoneRowIndex = {};

    document.querySelectorAll('.metal-row').forEach(row => {
        const itemId = row.getAttribute('data-item-id');
        const idx = parseInt(row.getAttribute('data-metal-index') || '0', 10);
        metalRowIndex[itemId] = Math.max(metalRowIndex[itemId] || 0, idx + 1);
    });
    document.querySelectorAll('.gemstone-row').forEach(row => {
        const itemId = row.getAttribute('data-item-id');
        const idx = parseInt(row.getAttribute('data-gemstone-index') || '0', 10);
        gemstoneRowIndex[itemId] = Math.max(gemstoneRowIndex[itemId] || 0, idx + 1);
    });

    // Ensure add buttons have a default starting index for their item ids
    document.querySelectorAll('.add-metal-btn').forEach(btn => {
        const itemId = btn.getAttribute('data-item-id');
        if (!metalRowIndex[itemId]) metalRowIndex[itemId] = 1;
    });
    document.querySelectorAll('.add-gemstone-btn').forEach(btn => {
        const itemId = btn.getAttribute('data-item-id');
        if (!gemstoneRowIndex[itemId]) gemstoneRowIndex[itemId] = 1;
    });

    // Add Metal Row
    document.querySelectorAll('.add-metal-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const itemId = this.getAttribute('data-item-id');
            const itemIndex = this.getAttribute('data-item-index');
            const itemUnit = this.getAttribute('data-item-unit');
            const container = document.querySelector('.metalContainer_' + itemId);
            const newIndex = metalRowIndex[itemId];
            const metalTemplate = `
                <div class="d-flex align-items-start mb-lg-4 mb-3 metal-row" data-item-id="${itemId}" data-metal-index="${newIndex}">
                    <div class="card brand-bg rounded-4 flex-grow-1">
                        <div class="card-body">
                            <div class="row g-lg-4 g-3">
                                <input type="hidden" name="article[${ itemIndex }][metals][${newIndex}][gjp_item_id]" value="${itemId}">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">{{ $cmsTranslations['precious_metal_type']->name }} <span class="text-danger">*</span></label>
                                    <select class="form-select" name="article[${ itemIndex }][metals][${newIndex}][precious_metal_type_id]">
                                        <option value="">Select...</option>
                                        ${Array.from(document.querySelectorAll('[name="article[{{ $index }}][metals][0][precious_metal_type_id]"] option')).slice(1).map(o => `<option value="${o.value}">${o.textContent}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">{{ $cmsTranslations['precious_color']->name }} <span class="text-danger">*</span></label>
                                    <select class="form-select" name="article[${ itemIndex }][metals][${newIndex}][precious_color_id]">
                                        <option value="">Select...</option>
                                        ${Array.from(document.querySelectorAll('[name="article[{{ $index }}][metals][0][precious_color_id]"] option')).slice(1).map(o => `<option value="${o.value}">${o.textContent}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">{{ $cmsTranslations['stamp']->name }} <span class="text-danger">*</span></label>
                                    <select class="form-select" name="article[${ itemIndex }][metals][${newIndex}][stamp_id]">
                                        <option value="">Select...</option>
                                        ${Array.from(document.querySelectorAll('[name="article[{{ $index }}][metals][0][stamp_id]"] option')).slice(1).map(o => `<option value="${o.value}">${o.textContent}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">{{ $cmsTranslations['purity']->name }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="article[${ itemIndex }][metals][${newIndex}][purity]" placeholder="Enter purity">
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <label class="form-label">{{ $cmsTranslations['metal_net_weight']->name }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="article[${ itemIndex }][metals][${newIndex}][metal_net_weight]" placeholder="Enter weight">
                                        <span class="input-group-text">{{ $cmsTranslations['grams']->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn p-0 delete-metal-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Metal">
                        <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.688 14.688L35.3119 35.3119"/>
                            <path d="M14.688 35.312L35.3119 14.6881"/>
                        </svg>
                    </button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', metalTemplate);
            metalRowIndex[itemId]++;
            attachDeleteHandlers();
            updateDeleteButtons();
        });
    });

    // Add Gemstone Row
    document.querySelectorAll('.add-gemstone-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const itemId = this.getAttribute('data-item-id');
            const itemUnit = this.getAttribute('data-item-unit');
            const itemIndex = this.getAttribute('data-item-index');
            const container = document.querySelector('.gemStoneContainer_' + itemId);
            const newIndex = gemstoneRowIndex[itemId];
            
            const gemstoneTemplate = `
                <div class="d-flex align-items-start mb-lg-4 mb-3 gemstone-row" data-item-id="${itemId}" data-gemstone-index="${newIndex}">
                    <div class="card brand-bg rounded-4 flex-grow-1">
                        <div class="card-body">
                            <p class="mb-2 form-label">{{ $cmsTranslations['choose_client_type']->name }}</p>
                            <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" role="tablist" data-gemstone-tabs="${ itemIndex }-${newIndex}">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#Diamond-${ itemIndex }-${newIndex}" type="button" role="tab" data-stone-type="diamond">{{ $cmsTranslations['diamond']->name }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#ColoredStones-${ itemIndex }-${newIndex}" type="button" role="tab" data-stone-type="colored">{{ $cmsTranslations['colored_stones']->name }}</button>
                                </li>
                            </ul>
                            <input type="hidden" name="article[${ itemIndex }][gem_stones][${newIndex}][stone_type]" class="stone-type-input" value="diamond">
                            <input type="hidden" name="article[${ itemIndex }][gem_stones][${newIndex}][gjp_item_id]" value="${itemId}">
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Diamond Tab -->
                                <div class="tab-pane fade show active" id="Diamond-${ itemIndex }-${newIndex}" role="tabpanel">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['number_of_stones']->name }} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][number_of_stones]" placeholder="Enter number">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['weight']->name }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][total_weight]" placeholder="Enter weight">
                                                <span class="input-group-text">{{ $cmsTranslations['carat']->name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['measurement']->name }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][measurement]" placeholder="Enter measurement">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['shape']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][shape_id]">
                                                <option value="">Select...</option>
                                                @foreach($shapes as $shape)
                                                    <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['cut_grade']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][cut_grade_id]">
                                                <option value="">Select...</option>
                                                @foreach($cutGrades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['color']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][color_id]">
                                                <option value="">Select...</option>
                                                @foreach($gemColors as $gemColor)
                                                    <option value="{{ $gemColor->id }}">{{ $gemColor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['fluorescence']->name }} <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][fluorescence_id]">
                                                <option value="">Select...</option>
                                                 @foreach($fluorescences as $fluorescence)
                                                    <option value="{{ $fluorescence->id }}">{{ $fluorescence->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['clarity']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][clarity_id]">
                                                <option value="">Select...</option>
                                                 @foreach($clarities as $clarity)
                                                    <option value="{{ $clarity->id }}">{{ $clarity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['plotting']->name }}</label>
                                            <input type="file" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][plotting]">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['estimated']->name }} <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][estimated_id]">
                                                <option value="">Select...</option>
                                                @foreach($estimateds as $estimated)
                                                    <option value="{{ $estimated->id }}">{{ $estimated->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['identification']->name }} <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][identification_id]">
                                                <option value="">Select...</option>
                                                @foreach($identifications as $identification)
                                                    <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][comment_id]">
                                                <option value="">Select...</option>
                                                @foreach($comments as $comment)
                                                    <option value="{{ $comment->id }}">{{ $comment->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">{{ $cmsTranslations['internal_comments']->name }}</label>
                                            <textarea class="form-control" placeholder="Enter here" rows="3" name="article[${ itemIndex }][gem_stones][${newIndex}][internal_comment]"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Colored Stones Tab -->
                                <div class="tab-pane fade" id="ColoredStones-${ itemIndex }-${newIndex}" role="tabpanel">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['number_of_stones']->name }} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][number_of_stones]" placeholder="Enter number">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['measurement']->name }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][measurement]" placeholder="Enter measurement">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['weight']->name }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][total_weight]" placeholder="Enter weight">
                                                <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][total_weight_unit_id]">
                                                    @foreach($units as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['weight_per_stone']->name }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][weight_per_stone]" placeholder="Enter weight per stone">
                                                <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][weight_stone_unit_id]">
                                                    @foreach($units as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['estimated']->name }} <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][estimated_id]">
                                                <option value="">Select...</option>
                                                @foreach($estimateds as $estimated)
                                                    <option value="{{ $estimated->id }}">{{ $estimated->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['identification']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][identification_id]">
                                                <option value="">Select...</option>
                                                @foreach($identifications as $identification)
                                                    <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['group']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][group_id]">
                                                <option value="">Select...</option>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['species']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][species_id]">
                                                <option value="">Select...</option>
                                                @foreach($species as $sp)
                                                    <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['variety']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][variety_id]">
                                                <option value="">Select...</option>
                                                @foreach($varieties as $variety)
                                                    <option value="{{ $variety->id }}">{{ $variety->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['color']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][color_id]">
                                                <option value="">Select...</option>
                                                @foreach($gemColors as $gemColor)
                                                    <option value="{{ $gemColor->id }}">{{ $gemColor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['clarity']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][clarity_id]">
                                                <option value="">Select...</option>
                                                @foreach($clarities as $clarity)
                                                    <option value="{{ $clarity->id }}">{{ $clarity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['transparency']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][transparency_id]">
                                                <option value="">Select...</option>
                                                @foreach($transparencies as $transparency)
                                                    <option value="{{ $transparency->id }}">{{ $transparency->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['luster']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][luster_id]">
                                                <option value="">Select...</option>
                                                @foreach($lusters as $luster)
                                                    <option value="{{ $luster->id }}">{{ $luster->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['phenomena']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][phenomena_id]">
                                                <option value="">Select...</option>
                                                @foreach($phenomena as $phen)
                                                    <option value="{{ $phen->id }}">{{ $phen->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][comment_id]">
                                                <option value="">Select...</option>
                                                @foreach($comments as $comment)
                                                    <option value="{{ $comment->id }}">{{ $comment->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">{{ $cmsTranslations['internal_comments']->name }}</label>
                                            <textarea class="form-control" placeholder="Enter here" rows="3" name="article[${ itemIndex }][gem_stones][${newIndex}][internal_comment]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn p-0 delete-gemstone-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Gem Stone">
                        <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.688 14.688L35.3119 35.3119"/>
                            <path d="M14.688 35.312L35.3119 14.6881"/>
                        </svg>
                    </button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', gemstoneTemplate);
            // initialize the new row so its hidden stone_type name/value and active pane names are correct
            const newRow = container.querySelector(`.gemstone-row[data-gemstone-index="${newIndex}"]`);
            initializeGemstoneRow(newRow);
            gemstoneRowIndex[itemId]++;
            attachDeleteHandlers();
            updateDeleteButtons();
        });
    });

    // Ensure that only inputs from the active tab pane are submitted
    // function setGemPaneNameState(row) {
    //     if (!row) return;
    //     const activePane = row.querySelector('.tab-pane.show.active');
    //     const stoneTypeInput = row.querySelector('.stone-type-input');

    //     // For each pane inside this row, toggle names
    //     row.querySelectorAll('.tab-pane').forEach(pane => {
    //         const inputs = pane.querySelectorAll('input, select, textarea');
    //         const isActive = pane === activePane;
    //         inputs.forEach(el => {
    //             if (isActive) {
    //                 // restore name if we previously removed it
    //                 const orig = el.getAttribute('data-orig-name');
    //                 if (orig) {
    //                     el.setAttribute('name', orig);
    //                     el.removeAttribute('data-orig-name');
    //                 }
    //             } else {
    //                 // remove name to prevent submission and store original
    //                 if (el.hasAttribute('name')) {
    //                     el.setAttribute('data-orig-name', el.getAttribute('name'));
    //                     el.removeAttribute('name');
    //                 }
    //             }
    //         });
    //     });

    //     // update stone type hidden input based on active pane
    //     if (stoneTypeInput) {
    //         const paneId = activePane ? (activePane.id || '') : '';
    //         const index = row.getAttribute('data-gemstone-index') || '0';
    //         // ensure the hidden input always has the correct name so it is submitted
    //         stoneTypeInput.setAttribute('name', `gem_stones[${index}][stone_type]`);
    //         // set the value according to the active pane
    //         if (paneId.startsWith('Diamond')) stoneTypeInput.value = 'diamond';
    //         else stoneTypeInput.value = 'colored';
    //     }
    // }

    // Listen for Bootstrap tab shown event to switch names
    document.addEventListener('shown.bs.tab', function(e) {
        // the activated tab button
        const btn = e.target;
        const row = btn.closest('.gemstone-row');
        if (row) initializeGemstoneRow(row);
    });

    // Initialize existing gemstone rows on load
    // document.querySelectorAll('.gemstone-row').forEach(row => setGemPaneNameState(row));

    // Delete handlers
    function attachDeleteHandlers() {
        document.querySelectorAll('.delete-metal-btn').forEach(btn => {
            btn.removeEventListener('click', deleteRow);
            btn.addEventListener('click', deleteRow);
        });
        document.querySelectorAll('.delete-gemstone-btn').forEach(btn => {
            btn.removeEventListener('click', deleteRow);
            btn.addEventListener('click', deleteRow);
        });
    }

    function deleteRow(e) {
        e.preventDefault();
        this.closest('.metal-row, .gemstone-row').remove();
        updateDeleteButtons();
    }

    // Show delete buttons if there are multiple rows
    function updateDeleteButtons() {
        document.querySelectorAll('[data-item-id]').forEach(container => {
            const itemId = container.getAttribute('data-item-id');
            const metalRows = document.querySelectorAll(`.metalContainer_${itemId} .metal-row`);
            const gemstoneRows = document.querySelectorAll(`.gemStoneContainer_${itemId} .gemstone-row`);
            
            metalRows.forEach(row => {
                row.querySelector('.delete-metal-btn').style.display = metalRows.length > 1 ? 'block' : 'none';
            });
            gemstoneRows.forEach(row => {
                row.querySelector('.delete-gemstone-btn').style.display = gemstoneRows.length > 1 ? 'block' : 'none';
            });
        });
    }

    attachDeleteHandlers();
    updateDeleteButtons();
});
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll("[data-gemstone-tabs]").forEach(function (group) {

        // Find the gemstone-row container
        const gemstoneRow = group.closest(".gemstone-row");

        // Hidden input is inside this row
        const hiddenInput = gemstoneRow.querySelector(".stone-type-input");
        // All tab buttons
        const buttons = group.querySelectorAll("button[data-stone-type]");

        buttons.forEach(btn => {
            btn.addEventListener("click", function () {

                const selectedType = btn.getAttribute("data-stone-type");

                hiddenInput.value = selectedType;

                console.log("Updated stone type:", selectedType);
            });
        });
    });

});
function initializeGemstoneRow(gemstoneRow) {
    const tabs = gemstoneRow.querySelector("[data-gemstone-tabs]");
    if (!tabs) return;
    const diamondTab = gemstoneRow.querySelector(`#Diamond-${tabs.dataset.gemstoneTabs}`);
    const coloredTab = gemstoneRow.querySelector(`#ColoredStones-${tabs.dataset.gemstoneTabs}`);
    const hiddenInput = gemstoneRow.querySelector(".stone-type-input");

    tabs.querySelectorAll("button[data-stone-type]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const type = btn.dataset.stoneType;
            hiddenInput.value = type;
            console.log('type ', type);
            if (type === "diamond") {
                enableFields(diamondTab);
                disableFields(coloredTab);
            } else {
                enableFields(coloredTab);
                disableFields(diamondTab);
            }
        });
    });

    // apply on initialization
    if (hiddenInput.value === "diamond") {
        enableFields(diamondTab);
        disableFields(coloredTab);
    } else {
        enableFields(coloredTab);
        disableFields(diamondTab);
    }

}

function disableFields(container) {
    if (!container) return;
    const NotBlank = [
        'gjp_item_id',
        'weight_stone_unit_id',
        'total_weight_unit_id'
    ];
    container.querySelectorAll("input, select, textarea").forEach(el => {

        console.log('inin', el.name);
        // Clear value
         const isNotBlank = NotBlank.some(key => 
            el.name && el.name.endsWith(`[${key}]`)
        );
        if (!isNotBlank) {
            if (el.type === "checkbox" || el.type === "radio") {
                el.checked = false;
            }
            else {
                el.value = "";
            }
        }

        // Disable field
        el.setAttribute("disabled", "disabled");
    });
    // container.querySelectorAll("input, select, textarea").forEach(el => el.setAttribute("disabled", "disabled"));
}

function enableFields(container) {
    if (!container) return;
    container.querySelectorAll("input, select, textarea").forEach(el => el.removeAttribute("disabled"));
}
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".gemstone-row").forEach(initializeGemstoneRow);
});
</script>
@endsection
