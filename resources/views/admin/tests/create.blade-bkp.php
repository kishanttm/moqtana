@extends('layouts.app')
@section('content')
<!-- breadcrumb -->
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">Start Tests</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.tests.index') }}" class="link">Test List</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $serviceOrder->order_number }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Validation Errors Alert -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5 class="alert-heading mb-2">Validation Errors</h5>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<form action="{{ route('admin.tests.store') }}" method="POST" id="testForm" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="service_order_id" value="{{ $serviceOrder->id }}">
    <input type="hidden" name="test_id" value="{{ $test->id }}">

    <div class="row g-lg-4 g-3">
        <div class="col-12">
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion">
                    <!-- Client Details -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ClientDetails" aria-expanded="true" aria-controls="ClientDetails">
                                <h5 class="mb-0 text-secondary">Client Details</h5>
                            </div>
                        </div>
                        <div id="ClientDetails" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            @if($serviceOrder->client && $serviceOrder->client->client_type === 'individual')
                                <div class="row g-lg-4 g-3">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Clients Name</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->individual_name ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Client Number</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->id ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Mobile Number</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->mobile_number ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Email Address</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->individual_email ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Date / Time</p>
                                        <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->client->created_at)->format('d M Y, h:i A') }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Employee Number Received</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->national_id ?? '-' }}</h5>
                                    </div>
                                </div>
                            @elseif($serviceOrder->client && $serviceOrder->client->client_type === 'business')
                                <div class="row g-lg-4 g-3">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Clients Name</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->company_name ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Client Number</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->id ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Mobile Number</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->accountant_mobile ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Email Address</p>
                                        <h5 class="fs-18 mb-0">{{ $serviceOrder->client->accountant_email ?? '-' }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Date / Time</p>
                                        <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->client->created_at)->format('d M Y, h:i A') }}</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Employee Number Received</p>
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
                        <!-- accordion 2 -->
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ServiceOrderDetails" aria-expanded="false" aria-controls="ServiceOrderDetails">
                                    <h5 class="mb-0 text-secondary">Service Order Details</h5>
                                </div>
                            </div>
                            <div id="ServiceOrderDetails" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">{{ $cmsTranslations['choose_service']->name }}</p>
                                            <h5 class="fs-18 mb-0">{{ ucfirst($serviceOrder->service_type) ?? '-' }}</h5>
                                        </div>
                                        {{-- {{ dd($serviceOrder) }} --}}
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
            <h5>Gemstones & Jewelry Pc# (GJP)</h5>
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion" id="articlesAccordion">
                    @forelse($serviceOrder->articles as $index => $item)
                    <!-- Article -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#JewelryType-{{ $item->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="JewelryType-{{ $item->id }}">
                                <div class="row g-lg-4 g-3 w-100">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Jewelry Type</p>
                                        <h6 class="mb-0">{{ $item->jewelryType->name ?? '-' }}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Total Weight</p>
                                        <h6 class="mb-0">{{ $item->total_weight }} {{ $item->weightUnit->name ?? '' }}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Studded Stones</p>
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
                                                        <span class="text-truncate">Picture {{ $key + 1}}</span>
                                                        <div class="d-flex gap-2 align-items-center ms-auto">
                                                            <a href="{{ asset('storage/' . $image->image_path) }}" download class="btn btn-sm btn-accent text-white">Download</a>
                                                            <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $image->image_path) }}')">Preview</button>
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
                                                    <p class="mb-0">Article belongings such as Boxes / Bag / Guarantee card:</p>
                                                    <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                        <a href="{{ asset('storage/' . $item->article_belonging_file) }}" download class="btn btn-sm btn-accent text-white">Download</a>
                                                        <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->article_belonging_file) }}')">Preview</button>
                                                    </div>
                                                </li>
                                            @endif
                                            @if(!empty($item->previous_valuation_report))
                                                <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                    <p class="mb-0">Previous Valuation Report:</p>
                                                    <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                        <a href="{{ asset('storage/' . $item->previous_valuation_report) }}" download class="btn btn-sm btn-accent text-white">Download</a>
                                                        <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->previous_valuation_report) }}')">Preview</button>
                                                    </div>
                                                </li>
                                            @endif
                                            @if(!empty($item->invoice_file))
                                                <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                    <p class="mb-0">Invoices related to the Article:</p>
                                                    <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                        <a href="{{ asset('storage/' . $item->invoice_file) }}" download class="btn btn-sm btn-accent text-white">Download</a>
                                                        <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->invoice_file) }}')">Preview</button>
                                                    </div>
                                                </li>
                                            @endif
                                            @if(!empty($item->attachment_file))
                                                <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                    <p class="mb-0 col-12 col-lg-6">Attachment:</p>
                                                    <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                        <a href="{{ asset('storage/' . $item->attachment_file) }}" download class="btn btn-sm btn-accent text-white">Download</a>
                                                        <button type="button" class="btn btn-sm btn-secondary text-white" onclick="window.open('{{ asset('storage/' . $item->attachment_file) }}')">Preview</button>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted mb-2">Comment</p>
                                        <h5 class="fs-18 mb-0">{{ $item->comment ?? 'No comment' }}</h5>
                                    </div>

                                    <!-- Metal Section -->
                                    <div class="col-12">
                                        <div class="metalContainer_{{ $item->id }}">
                                            @php $oldMetals = old('article.'.$index.'.metals', []); @endphp
                                            @if(!empty($oldMetals))
                                                @foreach($oldMetals as $mIndex => $metal)
                                                    @if(isset($metal['gjp_item_id']) && $metal['gjp_item_id'] == $item->id)
                                                    <div class="d-flex align-items-start mb-lg-4 mb-3 metal-row" data-item-id="{{ $item->id }}" data-metal-index="{{ $mIndex }}">
                                                        <div class="card brand-bg rounded-4 flex-grow-1">
                                                            <div class="card-body">
                                                                <div class="row g-lg-4 g-3">
                                                                    <input type="hidden" name="article[{{ $index }}][metals][{{ $mIndex }}][gjp_item_id]" value="{{ $item->id }}">
                                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                                        <label class="form-label">Precious Metal Type <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.metals.'.$mIndex.'.precious_metal_type_id') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][precious_metal_type_id]">
                                                                            <option value="">Select...</option>
                                                                            @foreach($metalTypes as $type)
                                                                            <option value="{{ $type->id }}" @if(isset($metal['precious_metal_type_id']) && $metal['precious_metal_type_id'] == $type->id) selected @endif>{{ $type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('article.'.$index.'.metals.'.$mIndex.'.precious_metal_type_id')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                                        <label class="form-label">Precious Color <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.metals.'.$mIndex.'.precious_color_id') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][precious_color_id]">
                                                                            <option value="">Select...</option>
                                                                            @foreach($colors as $color)
                                                                            <option value="{{ $color->id }}" @if(isset($metal['precious_color_id']) && $metal['precious_color_id'] == $color->id) selected @endif>{{ $color->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('article.'.$index.'.metals.'.$mIndex.'.precious_color_id')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                                        <label class="form-label">Stamp <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.metals.'.$mIndex.'.stamp_id') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][stamp_id]">
                                                                            <option value="">Select...</option>
                                                                            @foreach($stamps as $stamp)
                                                                            <option value="{{ $stamp->id }}" @if(isset($metal['stamp_id']) && $metal['stamp_id'] == $stamp->id) selected @endif>{{ $stamp->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('article.'.$index.'.metals.'.$mIndex.'.stamp_id')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                                        <label class="form-label">Purity <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control @error('article.'.$index.'.metals.'.$mIndex.'.purity') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][purity]" placeholder="Enter purity" value="{{ $metal['purity'] ?? '' }}">
                                                                        @error('article.'.$index.'.metals.'.$mIndex.'.purity')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-12">
                                                                        <label class="form-label">Metal Net Weight <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control @error('article.'.$index.'.metals.'.$mIndex.'.metal_net_weight') is-invalid @enderror" name="article[{{ $index }}][metals][{{ $mIndex }}][metal_net_weight]" placeholder="Enter weight" value="{{ $metal['metal_net_weight'] ?? '' }}">
                                                                            <span class="input-group-text">{{ $item->weightUnit->name }}</span>
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
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="d-flex align-items-start mb-lg-4 mb-3 metal-row" data-item-id="{{ $item->id }}" data-metal-index="0" >
                                                    <div class="card brand-bg rounded-4 flex-grow-1">
                                                        <div class="card-body">
                                                            <div class="row g-lg-4 g-3">
                                                                <input type="hidden" name="article[{{ $index }}][metals][0][gjp_item_id]" value="{{ $item->id }}">
                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                    <label class="form-label">Precious Metal Type <span class="text-danger">*</span></label>
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
                                                                    <label class="form-label">Precious Color <span class="text-danger">*</span></label>
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
                                                                    <label class="form-label">Stamp <span class="text-danger">*</span></label>
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
                                                                    <label class="form-label">Purity <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control @error('article.'.$index.'.metals.0.purity') is-invalid @enderror" name="article[{{ $index }}][metals][0][purity]" placeholder="Enter purity" value="{{ old('article.'.$index.'.metals.0.purity') }}">
                                                                    @error('article.'.$index.'.metals.0.purity')
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-lg-4 col-md-12">
                                                                    <label class="form-label">Metal Net Weight <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control @error('article.'.$index.'.metals.0.metal_net_weight') is-invalid @enderror" name="article[{{ $index }}][metals][0][metal_net_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.metals.0.metal_net_weight') }}">
                                                                        <span class="input-group-text">{{ $item->weightUnit->name ?? ''}}</span>
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
                                            @endif
                                        </div>
                                        <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0 add-metal-btn" data-item-id="{{ $item->id }}" data-item-unit="{{ $item->weightUnit->name ?? '' }}" data-item-index={{ $index ?? '' }}>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 5V19"/>
                                                <path d="M5 12H19"/>
                                            </svg>
                                            Add New Metal
                                        </button>
                                    </div>

                                    <!-- Gem Stone Section -->
                                    <div class="col-12">
                                        <div class="gemStoneContainer_{{ $item->id }}">
                                            @php $oldGemstones = old('article.'.$index.'.gem_stones', []); @endphp
                                            {{-- {{ dd(old('article.'.$index)) }} --}}
                                            @if(!empty($oldGemstones))
                                                @foreach($oldGemstones as $gIndex => $gem)
                                                    @if(isset($gem['gjp_item_id']) && $gem['gjp_item_id'] == $item->id)
                                                    <div class="d-flex align-items-start mb-lg-4 mb-3 gemstone-row" data-item-id="{{ $item->id }}" data-gemstone-index="{{ $gIndex }}">
                                                        <div class="card brand-bg rounded-4 flex-grow-1">
                                                            <div class="card-body">
                                                                <p class="mb-2 form-label">Choose Gem Stone Type</p>
                                                                @php
                                                                    $renderedStoneType = old('article.'.$index.'.gem_stones.'.$gIndex.'.stone_type') ?? 'diamond';
                                                                @endphp
                                                                <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" role="tablist" data-gemstone-tabs="{{ $index.'-'.$gIndex }}">
                                                                    <li class="nav-item" role="presentation">
                                                                        <button class="nav-link @if($renderedStoneType == 'diamond') active @endif" data-bs-toggle="pill" data-bs-target="#Diamond-{{ $index.'-'.$gIndex }}" type="button" role="tab" data-stone-type="diamond">Diamond</button>
                                                                    </li>
                                                                    <li class="nav-item" role="presentation">
                                                                        <button class="nav-link @if($renderedStoneType == 'colored') active @endif" data-bs-toggle="pill" data-bs-target="#ColoredStones-{{ $index.'-'.$gIndex }}" type="button" role="tab" data-stone-type="colored">Colored Stones</button>
                                                                    </li>
                                                                </ul>
                                                                <input type="hidden" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][gjp_item_id]" value="{{ $item->id }}">
                                                                <input type="hidden" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][stone_type]" class="stone-type-input" value="{{ $gem['stone_type'] ?? 'diamond' }}">
                                                                <div class="tab-content" id="pills-tabContent">
                                                                    <div class="tab-pane fade @if(($gem['stone_type'] ?? 'diamond') == 'diamond') show active @endif" id="Diamond-{{ $index.'-'.$gIndex }}" role="tabpanel">
                                                                        <div class="row g-lg-4 g-3">
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                                                                <input type="number" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][number_of_stones]" placeholder="Enter number" value="{{ $gem['number_of_stones'] ?? '' }}">
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Weight <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][total_weight]" placeholder="Enter weight" value="{{ $gem['total_weight'] ?? '' }}">
                                                                                    <span class="input-group-text">{{ $item->weightUnit->name ?? '' }}</span>
                                                                                    @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight')
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][measurement]" placeholder="Enter measurement" value="{{ $gem['measurement'] ?? '' }}">
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Shape</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.shape_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][shape_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($shapes as $shape)
                                                                                        <option value="{{ $shape->id }}" @if(isset($gem['shape_id']) && $gem['shape_id'] == $shape->id) selected @endif>{{ $shape->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.shape_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Cut Grade</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.cut_grade_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][cut_grade_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($cutGrades as $grade)
                                                                                    <option value="{{ $grade->id }}" @if(isset($gem['cut_grade_id']) && $gem['cut_grade_id'] == $grade->id) selected @endif>{{ $grade->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.cut_grade_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Color</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][color_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($gemColors as $gemColor)
                                                                                        <option value="{{ $gemColor->id }}" @if(isset($gem['color_id']) && $gem['color_id'] == $gemColor->id) selected @endif>{{ $gemColor->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Fluorescence <span class="text-danger">*</span></label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.fluorescence_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][fluorescence_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($fluorescences as $fluorescence)
                                                                                        <option value="{{ $fluorescence->id }}" @if(isset($gem['fluorescence_id']) && $gem['fluorescence_id'] == $fluorescence->id) selected @endif>{{ $fluorescence->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.fluorescence_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Clarity</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][clarity_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($clarities as $clarity)
                                                                                        <option value="{{ $clarity->id }}" @if(isset($gem['clarity_id']) && $gem['clarity_id'] == $clarity->id) selected @endif>{{ $clarity->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Plotting</label>
                                                                                <input type="file" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.plotting') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][plotting]">
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.plotting')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][estimated_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($estimateds as $estimated)
                                                                                        <option value="{{ $estimated->id }}" @if(isset($gem['estimated_id']) && $gem['estimated_id'] == $estimated->id) selected @endif>{{ $estimated->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Identification <span class="text-danger">*</span></label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][identification_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($identifications as $identification)
                                                                                        <option value="{{ $identification->id }}" @if(isset($gem['identification_id']) && $gem['identification_id'] == $identification->id) selected @endif>{{ $identification->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Comment</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.comment_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][comment_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($comments as $comment)
                                                                                        <option value="{{ $comment->id }}" @if(isset($gem['comment_id']) && $gem['comment_id'] == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.comment_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade @if(($gem['stone_type'] ?? '') == 'colored') show active @endif" id="ColoredStones-{{ $index.'-'.$gIndex }}" role="tabpanel">
                                                                        <div class="row g-lg-4 g-3">
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Number of Stones<span class="text-danger">*</span></label>
                                                                                <input type="number" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][number_of_stones]" value="{{ $gem['number_of_stones'] ?? '' }}" placeholder="Enter number of stone">
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.number_of_stones')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][measurement]" value="{{ $gem['measurement'] ?? '' }}" placeholder="Enter measurement">
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.measurement')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Weight <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][total_weight]" value="{{ $gem['total_weight'] ?? '' }}" placeholder="Enter weight">
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.total_weight_unit_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][total_weight_unit_id]">
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
                                                                                <label class="form-label">Weight per Stone <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control @error('article.'.$index.'.gem_stones.'.$gIndex.'.weight_per_stone') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][weight_per_stone]" value="{{ $gem['weight_per_stone'] ?? '' }}" placeholder="Enter weight per stone">
                                                                                    <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.weight_stone_unit_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][weight_stone_unit_id]">
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
                                                                                <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][estimated_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($estimateds as $estimated)
                                                                                        <option value="{{ $estimated->id }}" @if(isset($gem['estimated_id']) && $gem['estimated_id'] == $estimated->id) selected @endif>{{ $estimated->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.estimated_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Identification</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][identification_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($identifications as $identification)
                                                                                    <option value="{{ $identification->id }}" @if(isset($gem['identification_id']) && $gem['identification_id'] == $identification->id) selected @endif>{{ $identification->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.identification_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Group</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.group_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][group_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($groups as $group)
                                                                                    <option value="{{ $group->id }}" @if(isset($gem['group_id']) && $gem['group_id'] == $group->id) selected @endif>{{ $group->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.group_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Species</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.species_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][species_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($species as $sp)
                                                                                    <option value="{{ $sp->id }}" @if(isset($gem['species_id']) && $gem['species_id'] == $sp->id) selected @endif>{{ $sp->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.species_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Variety</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.variety_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][variety_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($varieties as $variety)
                                                                                    <option value="{{ $variety->id }}" @if(isset($gem['variety_id']) && $gem['variety_id'] == $variety->id) selected @endif>{{ $variety->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.variety_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Color</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][color_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($gemColors as $gemColor)
                                                                                    <option value="{{ $gemColor->id }}" @if(isset($gem['color_id']) && $gem['color_id'] == $gemColor->id) selected @endif>{{ $gemColor->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.color_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Clarity</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][clarity_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($clarities as $clarity)
                                                                                    <option value="{{ $clarity->id }}" @if(isset($gem['clarity_id']) && $gem['clarity_id'] == $clarity->id) selected @endif>{{ $clarity->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.clarity_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Transparency</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.transparency_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][transparency_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($transparencies as $transparency)
                                                                                    <option value="{{ $transparency->id }}" @if(isset($gem['transparency_id']) && $gem['transparency_id'] == $transparency->id) selected @endif>{{ $transparency->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.transparency_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Luster</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.luster_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][luster_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($lusters as $luster)
                                                                                    <option value="{{ $luster->id }}" @if(isset($gem['luster_id']) && $gem['luster_id'] == $luster->id) selected @endif>{{ $luster->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.luster_id')
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-6">
                                                                                <label class="form-label">Phenomena</label>
                                                                                <select class="form-select @error('article.'.$index.'.gem_stones.'.$gIndex.'.phenomena_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][{{ $gIndex }}][phenomena_id]">
                                                                                    <option value="">Select...</option>
                                                                                    @foreach($phenomena as $phen)
                                                                                    <option value="{{ $phen->id }}" @if(isset($gem['phenomena_id']) && $gem['phenomena_id'] == $phen->id) selected @endif>{{ $phen->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('article.'.$index.'.gem_stones.'.$gIndex.'.phenomena_id')
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
                                                    @endif
                                                @endforeach
                                            @else
                                                <!-- default first gemstone row -->
                                                <div class="d-flex align-items-start mb-lg-4 mb-3 gemstone-row" data-item-id="{{ $item->id }}" data-gemstone-index="0">
                                                    <div class="card brand-bg rounded-4 flex-grow-1">
                                                        <div class="card-body">
                                                            <p class="mb-2 form-label">Choose Gem Stone Type</p>
                                                            <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" role="tablist" data-gemstone-tabs="{{ $index.'-0' }}">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="{{ '#Diamond-'.$index.'-0' }}" type="button" role="tab" data-stone-type="diamond">Diamond</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="{{ '#ColoredStones-'.$index.'-0' }}" type="button" role="tab" data-stone-type="colored">Colored Stones</button>
                                                                </li>
                                                            </ul>
                                                            <input type="hidden" name="article[{{ $index }}][gem_stones][0][stone_type]" class="stone-type-input" value="diamond">
                                                            <input type="hidden" name="article[{{ $index }}][gem_stones][0][gjp_item_id]" value="{{ $item->id }}">
                                                            <div class="tab-content" id="pills-tabContent">
                                                            <!-- Diamond Tab -->
                                                            <div class="tab-pane fade show active" id="{{ 'Diamond-'.$index.'-0' }}" role="tabpanel">
                                                                <div class="row g-lg-4 g-3">
                                                                    
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                                                        <input type="number" class="form-control @error('article.'.$index.'.gem_stones.0.number_of_stones') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][number_of_stones]" placeholder="Enter number" value="{{ old('article.'.$index.'.gem_stones.0.number_of_stones') }}">
                                                                        @error('article.'.$index.'.gem_stones.0.number_of_stones')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Weight <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control @error('article.'.$index.'.gem_stones.0.total_weight') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][total_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.0.total_weight') }}">
                                                                            <span class="input-group-text">{{ $item->weightUnit->name ?? '' }}</span>
                                                                            @error('article.'.$index.'.gem_stones.0.total_weight')
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control @error('article.'.$index.'.gem_stones.0.measurement') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][measurement]" placeholder="Enter measurement" value="{{ old('article.'.$index.'.gem_stones.0.measurement') }}">
                                                                        @error('article.'.$index.'.gem_stones.0.measurement')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Shape</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.shape_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][shape_id]">
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
                                                                        <label class="form-label">Cut Grade</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.cut_grade_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][cut_grade_id]">
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
                                                                        <label class="form-label">Color</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.color_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][color_id]">
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
                                                                        <label class="form-label">Fluorescence <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.fluorescence_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][fluorescence_id]">
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
                                                                        <label class="form-label">Clarity</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.clarity_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][clarity_id]">
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
                                                                        <label class="form-label">Plotting</label>
                                                                        <input type="file" class="form-control @error('article.'.$index.'.gem_stones.0.plotting') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][plotting]" {{ old('article.'.$index.'.gem_stones.0.plotting') }}>
                                                                        @error('article.'.$index.'.gem_stones.0.plotting')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.estimated_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][estimated_id]">
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
                                                                        <label class="form-label">Identification <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.identification_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][identification_id]">
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
                                                                        <label class="form-label">Comment</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.comment_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][comment_id]">
                                                                            <option value="">Select...</option>
                                                                            @foreach($comments as $comment)
                                                                            <option value="{{ $comment->id }}" @if(old('article.'.$index.'.gem_stones.0.comment_id') == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('article.'.$index.'.gem_stones.0.comment_id')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Colored Stones Tab -->
                                                            <div class="tab-pane fade" id="{{ 'ColoredStones-'.$index.'-0' }}" role="tabpanel">
                                                                <div class="row g-lg-4 g-3">
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                                                        <input type="number" class="form-control @error('article.'.$index.'.gem_stones.0.number_of_stones') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][number_of_stones]" placeholder="Enter number" value={{ old('article.'.$index.'.gem_stones.0.number_of_stones') }}>
                                                                        @error('article.'.$index.'.gem_stones.0.number_of_stones')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control @error('article.'.$index.'.gem_stones.0.measurement') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][measurement]" placeholder="Enter measurement" value="{{ old('article.'.$index.'.gem_stones.0.measurement') }}">
                                                                        @error('article.'.$index.'.gem_stones.0.measurement')
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <label class="form-label">Weight <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control @error('article.'.$index.'.gem_stones.0.total_weight') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][total_weight]" placeholder="Enter weight" value="{{ old('article.'.$index.'.gem_stones.0.total_weight') }}">
                                                                            <select class="form-select @error('article.'.$index.'.gem_stones.0.total_weight_unit_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][total_weight_unit_id]">
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
                                                                        <label class="form-label">Weight per Stone <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control @error('article.'.$index.'.gem_stones.0.weight_per_stone') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][weight_per_stone]" placeholder="Enter weight per stone" value="{{ old('article.'.$index.'.gem_stones.0.weight_per_stone') }}">
                                                                            <select class="form-select @error('article.'.$index.'.gem_stones.0.weight_stone_unit_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][weight_stone_unit_id]">
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
                                                                        <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.estimated_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][estimated_id]">
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
                                                                        <label class="form-label">Identification</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.identification_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][identification_id]">
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
                                                                        <label class="form-label">Group</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.group_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][group_id]">
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
                                                                        <label class="form-label">Species</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.species_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][species_id]">
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
                                                                        <label class="form-label">Variety</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.variety_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][variety_id]">
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
                                                                        <label class="form-label">Color</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.color_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][color_id]">
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
                                                                        <label class="form-label">Clarity</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.clarity_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][clarity_id]">
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
                                                                        <label class="form-label">Transparency</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.transparency_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][transparency_id]">
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
                                                                        <label class="form-label">Luster</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.luster_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][luster_id]">
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
                                                                        <label class="form-label">Phenomena</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.phenomena_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][phenomena_id]">
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
                                                                        <label class="form-label">Comment</label>
                                                                        <select class="form-select @error('article.'.$index.'.gem_stones.0.comment_id') is-invalid @enderror" name="article[{{ $index }}][gem_stones][0][comment_id]">
                                                                            <option value="">Select...</option>
                                                                            @foreach($comments as $comment)
                                                                            <option value="{{ $comment->id }}" @if(old('article.'.$index.'.gem_stones.0.comment_id') == $comment->id) selected @endif>{{ $comment->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('article.'.$index.'.gem_stones.0.comment_id')
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
                                            @endif
                                        </div>
                                        <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0 add-gemstone-btn" data-item-id="{{ $item->id }}" data-item-unit={{ $item->weightUnit->name ?? '' }} data-item-index={{ $index ?? '' }}>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 5V19"/>
                                                <path d="M5 12H19"/>
                                            </svg>
                                            Add New Gem Stone
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-warning">No articles found for this service order.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="col-12">
            <div class="page-action mt-2">
                <button type="submit" class="btn btn-big btn-primary">Save</button>
                <a href="{{ route('admin.tests.index') }}" class="btn btn-big btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    let metalRowIndex = {};
    let gemstoneRowIndex = {};

    // Initialize counters for each article using existing data-metal-index / data-gemstone-index
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
            const itemUnit = this.getAttribute('data-item-unit');
            const itemIndex = this.getAttribute('data-item-index');

            const container = document.querySelector('.metalContainer_' + itemId);
            const newIndex = metalRowIndex[itemId];
            const metalTemplate = `
                <div class="d-flex align-items-start mb-lg-4 mb-3 metal-row" data-item-id="${itemId}" data-metal-index="${newIndex}">
                    <div class="card brand-bg rounded-4 flex-grow-1">
                        <div class="card-body">
                            <div class="row g-lg-4 g-3">
                                <input type="hidden" name="article[${ itemIndex }][metals][${newIndex}][gjp_item_id]" value="${itemId}">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">Precious Metal Type <span class="text-danger">*</span></label>
                                    <select class="form-select" name="article[${ itemIndex }][metals][${newIndex}][precious_metal_type_id]">
                                        <option value="">Select...</option>
                                        ${Array.from(document.querySelectorAll('[name="article[{{ $index }}][metals][0][precious_metal_type_id]"] option')).slice(1).map(o => `<option value="${o.value}">${o.textContent}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">Precious Color <span class="text-danger">*</span></label>
                                    <select class="form-select" name="article[${ itemIndex }][metals][${newIndex}][precious_color_id]">
                                        <option value="">Select...</option>
                                        ${Array.from(document.querySelectorAll('[name="article[{{ $index }}][metals][0][precious_color_id]"] option')).slice(1).map(o => `<option value="${o.value}">${o.textContent}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">Stamp <span class="text-danger">*</span></label>
                                    <select class="form-select" name="article[${ itemIndex }][metals][${newIndex}][stamp_id]">
                                        <option value="">Select...</option>
                                        ${Array.from(document.querySelectorAll('[name="article[{{ $index }}][metals][0][stamp_id]"] option')).slice(1).map(o => `<option value="${o.value}">${o.textContent}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-label">Purity <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="article[${ itemIndex }][metals][${newIndex}][purity]" placeholder="Enter purity">
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <label class="form-label">Metal Net Weight <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="article[${ itemIndex }][metals][${newIndex}][metal_net_weight]" placeholder="Enter weight">
                                        <span class="input-group-text">${itemUnit}</span>
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
                            <p class="mb-2 form-label">Choose Gem Stone Type</p>
                            <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" role="tablist" data-gemstone-tabs="${ itemIndex }-${newIndex}">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#Diamond-${ itemIndex }-${newIndex}" type="button" role="tab" data-stone-type="diamond">Diamond</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#ColoredStones-${ itemIndex }-${newIndex}" type="button" role="tab" data-stone-type="colored">Colored Stones</button>
                                </li>
                            </ul>
                            <input type="hidden" name="article[${ itemIndex }][gem_stones][${newIndex}][stone_type]" class="stone-type-input" value="diamond">
                            <input type="hidden" name="article[${ itemIndex }][gem_stones][${newIndex}][gjp_item_id]" value="${itemId}">
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Diamond Tab -->
                                <div class="tab-pane fade show active" id="Diamond-${ itemIndex }-${newIndex}" role="tabpanel">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][number_of_stones]" placeholder="Enter number of stones">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Weight <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][total_weight]" placeholder="Enter weight">
                                                <span class="input-group-text">${itemUnit}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][measurement]" placeholder="Enter measurement">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Shape</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][shape_id]">
                                                <option value="">Select...</option>
                                                @foreach($shapes as $shape)
                                                    <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Cut Grade</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][cut_grade_id]">
                                                <option value="">Select...</option>
                                                @foreach($cutGrades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Color</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][color_id]">
                                                <option value="">Select...</option>
                                                @foreach($gemColors as $gemColor)
                                                    <option value="{{ $gemColor->id }}">{{ $gemColor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Fluorescence <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][fluorescence_id]">
                                                <option value="">Select...</option>
                                                 @foreach($fluorescences as $fluorescence)
                                                    <option value="{{ $fluorescence->id }}">{{ $fluorescence->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Clarity</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][clarity_id]">
                                                <option value="">Select...</option>
                                                 @foreach($clarities as $clarity)
                                                    <option value="{{ $clarity->id }}">{{ $clarity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Plotting</label>
                                            <input type="file" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][plotting]">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][estimated_id]">
                                                <option value="">Select...</option>
                                                @foreach($estimateds as $estimated)
                                                    <option value="{{ $estimated->id }}">{{ $estimated->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Identification <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][identification_id]">
                                                <option value="">Select...</option>
                                                @foreach($identifications as $identification)
                                                    <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Comment</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][comment_id]">
                                                <option value="">Select...</option>
                                                @foreach($comments as $comment)
                                                    <option value="{{ $comment->id }}">{{ $comment->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Colored Stones Tab -->
                                <div class="tab-pane fade" id="ColoredStones-${ itemIndex }-${newIndex}" role="tabpanel">
                                    <div class="row g-lg-4 g-3">
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][number_of_stones]" placeholder="Enter number">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][measurement]" placeholder="Enter measurement">
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Weight <span class="text-danger">*</span></label>
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
                                            <label class="form-label">Weight per Stone <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="article[${ itemIndex }][gem_stones][${newIndex}][weight_per_stone]" placeholder="Enter weight per stone">
                                                <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][weight_stone_unit_id]">
                                                    @foreach($units as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach</select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][estimated_id]">
                                                <option value="">Select...</option>
                                                @foreach($estimateds as $estimated)
                                                    <option value="{{ $estimated->id }}">{{ $estimated->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Identification</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][identification_id]">
                                                <option value="">Select...</option>
                                                @foreach($identifications as $identification)
                                                    <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Group</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][group_id]">
                                                <option value="">Select...</option>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Species</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][species_id]">
                                                <option value="">Select...</option>
                                                @foreach($species as $sp)
                                                    <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Variety</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][variety_id]">
                                                <option value="">Select...</option>
                                                @foreach($varieties as $variety)
                                                    <option value="{{ $variety->id }}">{{ $variety->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Color</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][color_id]">
                                                <option value="">Select...</option>
                                                @foreach($gemColors as $gemColor)
                                                    <option value="{{ $gemColor->id }}">{{ $gemColor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Clarity</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][clarity_id]">
                                                <option value="">Select...</option>
                                                @foreach($clarities as $clarity)
                                                    <option value="{{ $clarity->id }}">{{ $clarity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Transparency</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][transparency_id]">
                                                <option value="">Select...</option>
                                                @foreach($transparencies as $transparency)
                                                    <option value="{{ $transparency->id }}">{{ $transparency->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Luster</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][luster_id]">
                                                <option value="">Select...</option>
                                                @foreach($lusters as $luster)
                                                    <option value="{{ $luster->id }}">{{ $luster->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Phenomena</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][phenomena_id]">
                                                <option value="">Select...</option>
                                                @foreach($phenomena as $phen)
                                                    <option value="{{ $phen->id }}">{{ $phen->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <label class="form-label">Comment</label>
                                            <select class="form-select" name="article[${ itemIndex }][gem_stones][${newIndex}][comment_id]">
                                                <option value="">Select...</option>
                                                @foreach($comments as $comment)
                                                    <option value="{{ $comment->id }}">{{ $comment->name }}</option>
                                                @endforeach
                                            </select>
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
            const newRow = container.querySelector(`.gemstone-row[data-gemstone-index="${newIndex}"]`);
            initializeGemstoneRow(newRow);

            gemstoneRowIndex[itemId]++;
            attachDeleteHandlers();
            updateDeleteButtons();
        });
    });

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
// document.addEventListener("DOMContentLoaded", function () {

//     document.querySelectorAll("[data-gemstone-tabs]").forEach(function (tabs) {

//         const gemstoneRow = tabs.closest(".gemstone-row");

//         const diamondTab = gemstoneRow.querySelector(`#Diamond-${tabs.dataset.gemstoneTabs}`);
//         const coloredTab = gemstoneRow.querySelector(`#ColoredStones-${tabs.dataset.gemstoneTabs}`);

//         const hiddenInput = gemstoneRow.querySelector(".stone-type-input");

//         tabs.querySelectorAll("button[data-stone-type]").forEach(function (btn) {
//             btn.addEventListener("click", function () {

//                 const type = btn.dataset.stoneType;

//                 // update hidden input
//                 hiddenInput.value = type;

//                 // enable/disable fields
//                 if (type === "diamond") {
//                     enableFields(diamondTab);
//                     disableFields(coloredTab);
//                 } else {
//                     enableFields(coloredTab);
//                     disableFields(diamondTab);
//                 }
//             });
//         });

//         // apply on page load
//         if (hiddenInput.value === "diamond") {
//             enableFields(diamondTab);
//             disableFields(coloredTab);
//         } else {
//             enableFields(coloredTab);
//             disableFields(diamondTab);
//         }

//     });

//     function disableFields(container) {
//         if (!container) return;
//         container.querySelectorAll("input, select, textarea").forEach(el => {
//             el.setAttribute("disabled", "disabled");
//         });
//     }

//     function enableFields(container) {
//         if (!container) return;
//         container.querySelectorAll("input, select, textarea").forEach(el => {
//             el.removeAttribute("disabled");
//         });
//     }
// });
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
