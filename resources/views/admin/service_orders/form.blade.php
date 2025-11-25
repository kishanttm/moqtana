<div class="row g-lg-4 g-3">
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="row g-lg-4 g-3">
                    <div class="col-12">
                        <div class="col-lg-6">
                            <label class="form-label">{{ $cmsTranslations['choose_client']->name }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-select @error('client_id') is-invalid @enderror" name="client_id" required>
                                    <option value="">Select...</option>
                                    @foreach($clients as $client)
                                    @if($client->client_type === 'individual')
                                        <option value="{{ $client->id }}" 
                                            {{ old('client_id', $order->client_id ?? '') == $client->id ? 'selected' : '' }}>
                                            {{ $client->individual_name }}
                                        </option>
                                    @elseif($client->client_type === 'business')
                                        <td>{{ $client->company_name ?? '-'}}</td>
                                        <option value="{{ $client->id }}" 
                                            {{ old('client_id', $order->client_id ?? '') == $client->id ? 'selected' : '' }}>
                                            {{ $client->company_name }}
                                        </option>
                                    @endif
                                        
                                    @endforeach
                                </select>
                                {{-- <button class="btn btn-accent text-white" type="button">Add Client</button> --}}
                                <a class="btn btn-accent text-white d-flex align-items-center" href="{{ route('clients.create') }}" type="button"> {{ $cmsTranslations['add_client']->name }}</a>
                            </div>
                            @error('client_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <span id="clientDetailsContainer" style="display: none;"> --}}
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 clientDetailsContainer" style="display: none;">
                            <p class="text-muted mb-2">{{ $cmsTranslations['clients_name']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientName">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 clientDetailsContainer" style="display: none;">
                            <p class="text-muted mb-2">{{ $cmsTranslations['client_number']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientNumber">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 clientDetailsContainer" style="display: none;">
                            <p class="text-muted mb-2">{{ $cmsTranslations['mobile_number']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientMobile">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 clientDetailsContainer" style="display: none;">
                            <p class="text-muted mb-2">{{ $cmsTranslations['email_address']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientEmail"></h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 clientDetailsContainer" style="display: none;">
                            <p class="text-muted mb-2">{{ $cmsTranslations['date_time']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientdatetime">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 clientDetailsContainer" style="display: none;">
                            <p class="text-muted mb-2">{{ $cmsTranslations['employee_number_received']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientEmployeeNumber">-</h5>
                        </div>
                    {{-- </span> --}}
                    <!-- Client Details Display -->
                    <div id="clientDetailsContainer" style="display: none;">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['clients_name']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientName">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['client_number']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientNumber">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['mobile_number']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientMobile">-</h5>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['email_address']->name }}</p>
                            <h5 class="fs-18 mb-0" id="clientEmail">-</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <p class="mb-1 form-label">{{ $cmsTranslations['choose_service']->name }} <span class="text-danger">*</span></p>
                @php
                    $serviceType = old('service_type') ?? ($order->service_type ?? 'valuation');
                @endphp
                <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" id="serviceType-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $serviceType == 'valuation' ? 'active' : '' }}" 
                                id="Valuation-tab" data-bs-toggle="pill" data-bs-target="#Valuation" 
                                type="button" role="tab" aria-controls="Valuation" 
                                aria-selected="{{ $serviceType == 'valuation' ? 'true' : 'false' }}"
                                onclick="setServiceType('valuation')">
                                {{ $cmsTranslations['valuation_service']->name }}
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $serviceType == 'consultation' ? 'active' : '' }}" 
                                id="Consultation-tab" data-bs-toggle="pill" data-bs-target="#Consultation" 
                                type="button" role="tab" aria-controls="Consultation" 
                                aria-selected="{{ $serviceType == 'consultation' ? 'true' : 'false' }}"
                                onclick="setServiceType('consultation')">
                                {{ $cmsTranslations['consultation_service']->name }}
                        </button>
                    </li>
                </ul>

                <input type="hidden" name="service_type" id="service_type_hidden" value="{{ old('service_type', $order->service_type ?? 'valuation') }}">
                <div class="tab-content" id="serviceType-tabContent">
                    <!-- Valuation -->
                    <div class="tab-pane fade show {{ $serviceType == 'valuation' ? 'active' : '' }}" id="Valuation" role="tabpanel" aria-labelledby="Valuation-tab" tabindex="0">
                        <div class="row g-lg-4 g-3">
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['purpose_of_valuation']->name }} <span class="text-danger">*</span></label>
                                <select class="form-select @error('purpose') is-invalid @enderror" name="purpose" required>
                                    <option value="">Select...</option>
                                    @foreach ($purposeOfValuations as $purposeOfValuation)
                                        <option value="{{ $purposeOfValuation->id }}" {{ old('purpose', $order->purpose_id ?? '' ) == $purposeOfValuation->id ? 'selected' : '' }}>{{ $purposeOfValuation->name }}</option>
                                    @endforeach
                                </select>
                                @error('purpose')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 align-items-end d-flex">
                                <div class="d-flex align-items-center gap-2 custom-toggle">
                                    <div class="btn-group btn-group-sm toggle-seg" role="group" aria-label="Other owners?">
                                        <input type="radio" class="btn-check" name="has_other_owners" id="ownersYes" value="1" 
                                            {{ old('has_other_owners', $order->has_other_owners ?? false) ? 'checked' : '' }}>
                                        <label class="btn btn-outline-seg" for="ownersYes">{{ $cmsTranslations['yes']->name }}</label>
                                        <input type="radio" class="btn-check" name="has_other_owners" id="ownersNo" value="0" 
                                            {{ !old('has_other_owners', $order->has_other_owners ?? false) ? 'checked' : '' }}>
                                        <label class="btn btn-outline-seg" for="ownersNo">{{ $cmsTranslations['no']->name }}</label>
                                    </div>
                                    <label>{{ $cmsTranslations['other_owners']->name }}</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['how_many']->name }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('how_many') is-invalid @enderror" 
                                        name="how_many" placeholder="Enter here" required min="1"
                                        value="{{ old('how_many', $order->how_many ?? '') }}">
                                @error('how_many')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['your_percentage']->name }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('ownership_percentage') is-invalid @enderror" 
                                        name="ownership_percentage" placeholder="Enter here" required min="1" max="100" step="0.01"
                                        value="{{ old('ownership_percentage', $order->ownership_percentage ?? '') }}">
                                @error('ownership_percentage')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['government_referral']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('government_referral') is-invalid @enderror" 
                                        name="government_referral" placeholder="Enter here" required
                                        value="{{ old('government_referral', $order->government_referral ?? '') }}">
                                @error('government_referral')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['any_other_use']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('other_use_of_report') is-invalid @enderror" 
                                        name="other_use_of_report" placeholder="Enter here" required
                                        value="{{ old('other_use_of_report', $order->other_use_of_report ?? '') }}">
                                @error('other_use_of_report')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['delivery_date']->name }} <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('delivery_date') is-invalid @enderror" 
                                        name="delivery_date" placeholder="Enter here" required
                                        value="{{ old('delivery_date', isset($order) && $order->delivery_date ? $order->delivery_date->format('Y-m-d') : '') }}">
                                @error('delivery_date')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" 
                                            placeholder="Enter here" rows="3" name="comment">{{ old('comment', $order->comment ?? '') }}</textarea>
                                @error('comment')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Consultation -->
                    <div class="tab-pane fade {{ $serviceType == 'consultation' ? 'active show' : '' }}" id="Consultation" role="tabpanel" aria-labelledby="Consultation-tab" tabindex="0">
                        <div class="row g-lg-4 g-3">
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['consultation_type']->name }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('consultation') is-invalid @enderror" 
                                        name="consultation" placeholder="Enter consultation details"
                                        value="{{ old('consultation', $order->consultation ?? '') }}">
                                @error('consultation')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['delivery_date']->name }} <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('delivery_date') is-invalid @enderror" 
                                        name="delivery_date"
                                        value="{{ old('delivery_date', isset($order) && $order->delivery_date ? $order->delivery_date->format('Y-m-d') : '') }}">
                                @error('delivery_date')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <h5 class="mb-lg-4 mb-3">{{ $cmsTranslations['gemstones_jewelry_pc']->name }}</h5>
                <div id="articles-container">
                    @php
                        $articles = old('articles', isset($order) ? $order->articles->toArray() : []);
                        if(empty($articles)) {
                            $articles = [[]]; // At least one empty article row
                        }
                    @endphp

                    @foreach($articles as $index => $article)
                    <div class="article-row border rounded p-3 mb-3">
                        @if(isset($article['id']))
                            <input type="hidden" name="articles[{{ $index }}][id]" value="{{ $article['id'] }}">
                        @endif
                        <div class="row g-lg-4 g-3">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label class="form-label">{{ $cmsTranslations['jewellery_types']->name }} <span class="text-danger">*</span></label>
                                <select class="form-select @error("articles.$index.jewellery_type_id") is-invalid @enderror" 
                                        name="articles[{{ $index }}][jewellery_type_id]" required>
                                    <option value="">Select...</option>
                                    @if(isset($jewelryTypes))
                                        @foreach($jewelryTypes as $type)
                                            <option value="{{ $type->id }}" 
                                                {{ old("articles.$index.jewellery_type_id", $article['jewellery_type_id'] ?? '') == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label class="form-label">{{ $cmsTranslations['total_weight']->name }}<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error("articles.$index.total_weight") is-invalid @enderror" 
                                            name="articles[{{ $index }}][total_weight]" placeholder="Enter weight" required
                                            value="{{ old("articles.$index.total_weight", $article['total_weight'] ?? '') }}">
                                    <select class="form-select @error("articles.$index.weight_unit") is-invalid @enderror"
                                            name="articles[{{ $index }}][weight_unit]" required>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" 
                                                {{ old("articles.$index.weight_unit", $article['weight_unit_id'] ?? '') == $unit->id ? 'selected' : '' }}>
                                                {{ $unit->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label class="form-label">{{ $cmsTranslations['studded_stones']->name }} <span class="text-danger">*</span></label>
                                <select class="form-select @error("articles.$index.studded_stone_id") is-invalid @enderror"
                                        name="articles[{{ $index }}][studded_stone_id]" required>
                                    <option value="">Select...</option>
                                    @if(isset($studdedStones))
                                        @foreach($studdedStones as $stone)
                                            <option value="{{ $stone->id }}" 
                                                {{ old("articles.$index.studded_stone_id", $article['studded_stone_id'] ?? '') == $stone->id ? 'selected' : '' }}>
                                                {{ $stone->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Pictures Upload Section -->
                            <div class="col-12">
                                <label class="form-label">{{ $cmsTranslations['pictures']->name }} <span class="text-danger">*</span></label>
                                <div id="pictures-container-{{ $index }}">
                                    @php
                                        $pictures = old("articles.$index.images", isset($article['images']) ? $article['images'] : []);
                                    @endphp
                                    @if(!empty($pictures))
                                        @foreach($pictures as $picIndex => $picture)
                                            <div class="picture-row mb-3" data-picture-id="{{ $picture->id ?? '' }}">
                                                <div class="d-flex gap-lg-4 gap-3 align-items-center file-checkbox-group">
                                                    <!-- Hidden field to track picture ID for updates -->
                                                    <input type="hidden" 
                                                            name="articles[{{ $index }}][images][{{ $picIndex }}][id]"
                                                            value="{{ $picture['id'] ?? '' }}">
                                                    
                                                    <div class="input-group">
                                                        <!-- File input: only for replacing image -->
                                                        <input class="form-control picture-file" type="file" 
                                                                name="articles[{{ $index }}][images][{{ $picIndex }}][file]"
                                                                data-picture-id="{{ $picture['id']  ?? '' }}">
                                                        <!-- Existing image preview -->
                                                        {{-- @if($picture['image_path'])
                                                            <small class="text-muted d-block mt-1">
                                                                Current: {{ basename($picture['image_path']) }}
                                                            </small>
                                                        @endif --}}
                                                        
                                                        <!-- Description/Caption -->
                                                        <input type="text" class="form-control" 
                                                                name="articles[{{ $index }}][images][{{ $picIndex }}][name]"
                                                                placeholder="Picture description" 
                                                                value="{{ old("articles.$index.images.$picIndex.name", $picture['name'] ?? '') }}">
                                                    </div>
                                                    
                                                    <!-- For Testing checkbox -->
                                                    <div class="form-check lg">
                                                        <input class="form-check-input" type="checkbox" 
                                                                name="articles[{{ $index }}][images][{{ $picIndex }}][for_testing]" 
                                                                id="ForTesting-{{ $index }}-{{ $picIndex }}"
                                                                value="1"
                                                                {{ old("articles.$index.images.$picIndex.for_testing", $picture['for_testing'] ?? 0) ? 'checked' : '' }}>
                                                        <label class="form-check-label text-nowrap" 
                                                                for="ForTesting-{{ $index }}-{{ $picIndex }}">{{ $cmsTranslations['for_testing']->name }}</label>
                                                    </div>
                                                    
                                                    <!-- For Valuation Report checkbox -->
                                                    <div class="form-check lg">
                                                        <input class="form-check-input" type="checkbox" 
                                                                name="articles[{{ $index }}][images][{{ $picIndex }}][for_valuation_report]" 
                                                                id="ForvalReport-{{ $index }}-{{ $picIndex }}"
                                                                value="1"
                                                                {{ old("articles.$index.images.$picIndex.for_valuation_report", $picture['for_valuation_report'] ?? 0) ? 'checked' : '' }}>
                                                        <label class="form-check-label text-nowrap" 
                                                                for="ForvalReport-{{ $index }}-{{ $picIndex }}">{{ $cmsTranslations['for_valuation_report']->name }}</label>
                                                    </div>
                                                    
                                                    <!-- Remove button -->
                                                    <button type="button" 
                                                            class="btn btn-sm btn-danger remove-picture" 
                                                            data-picture-id="{{ $picture['id']  ?? '' }}"
                                                            title="Delete this picture">
                                                        {{ $cmsTranslations['remove']->name }}
                                                    </button>
                                                </div>
                                                @error("articles.$index.images.$picIndex.file")
                                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="picture-row mb-3">
                                            <div class="d-flex gap-lg-4 gap-3 align-items-center file-checkbox-group">
                                                <div class="input-group">
                                                    <input class="form-control picture-file" type="file" 
                                                            name="articles[{{ $index }}][images][0][file]">
                                                    <input type="text" class="form-control" 
                                                            name="articles[{{ $index }}][images][0][name]"
                                                            placeholder="Picture description">
                                                </div>
                                                <div class="form-check lg">
                                                    <input class="form-check-input" type="checkbox" 
                                                            name="articles[{{ $index }}][images][0][for_testing]" 
                                                            id="ForTesting-{{ $index }}-0"
                                                            value="1">
                                                    <label class="form-check-label text-nowrap" 
                                                            for="ForTesting-{{ $index }}-0">{{ $cmsTranslations['for_testing']->name }}</label>
                                                </div>
                                                <div class="form-check lg">
                                                    <input class="form-check-input" type="checkbox" 
                                                            name="articles[{{ $index }}][images][0][for_valuation_report]" 
                                                            id="ForvalReport-{{ $index }}-0"
                                                            value="1">
                                                    <label class="form-check-label text-nowrap" 
                                                            for="ForvalReport-{{ $index }}-0">{{ $cmsTranslations['for_valuation_report']->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0 add-picture" 
                                        data-article-index="{{ $index }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 5V19"/>
                                        <path d="M5 12H19"/>
                                    </svg>
                                    {{ $cmsTranslations['add_new_picture']->name }}
                                </button>
                            </div>

                            <!-- Attachments Section -->
                            <div class="col-lg-6 col-md-12 {{ $serviceType != 'valuation' ? 'd-none' : '' }} valuation-content">
                                <label class="form-label">{{ $cmsTranslations['article_belongings']->name }}</label>
                                <input class="form-control" type="file" 
                                        name="articles[{{ $index }}][article_belonging_file]">
                            </div>
                            <div class="col-lg-6 col-md-12 {{ $serviceType != 'valuation' ? 'd-none' : '' }} valuation-content">
                                <label class="form-label">{{ $cmsTranslations['previous_valuation_report']->name }}</label>
                                <input class="form-control" type="file" 
                                        name="articles[{{ $index }}][previous_valuation_report]">
                            </div>
                            <div class="col-lg-6 col-md-12 {{ $serviceType != 'valuation' ? 'd-none' : '' }} valuation-content">
                                <label class="form-label">{{ $cmsTranslations['invoices_related']->name }}</label>
                                <input class="form-control" type="file" 
                                        name="articles[{{ $index }}][invoice_file]">
                            </div>
                            <div class="col-lg-6 col-md-12 {{ $serviceType != 'valuation' ? 'd-none' : '' }} valuation-content">
                                <label class="form-label">{{ $cmsTranslations['attachment']->name }}</label>
                                <input class="form-control" type="file" 
                                        name="articles[{{ $index }}][attachment_file]">
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                                <textarea class="form-control @error("articles.$index.comment") is-invalid @enderror" 
                                            placeholder="Enter here" rows="3"
                                            name="articles[{{ $index }}][comment]">{{ old("articles.$index.comment", $article['comment'] ?? '') }}</textarea>
                            </div>
                        </div>

                        @if($index > 0)
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-sm btn-danger remove-article">
                                <i class="fas fa-trash"></i> {{ $cmsTranslations['remove_article']->name }}
                            </button>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0" id="add-article-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5V19"/>
                        <path d="M5 12H19"/>
                    </svg>
                    {{ $cmsTranslations['add_new_article']->name }}
                </button>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="page-action mt-2">
            <button type="submit" class="btn btn-big btn-primary">{{ isset($order) ? $cmsTranslations['update']->name : $cmsTranslations['save']->name }}</button>
            <a href="{{ route('admin.service-orders.index') }}" class="btn btn-big btn-secondary btn-cancel">{{ $cmsTranslations['cancel']->name }}</a>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const clientSelect = document.querySelector('select[name="client_id"]');
    const clientDetailsContainer = document.getElementsByClassName('clientDetailsContainer');

    // Load client details when selected
    if(clientSelect) {
        clientSelect.addEventListener('change', function() {
            if(this.value) {
                loadClientDetails(this.value);
            } else {
                clientDetailsContainer.style.display = 'none';
            }
        });

        // Load on init if client is already selected
        if(clientSelect.value) {
            loadClientDetails(clientSelect.value);
        }
    }

    // Function to load client details
    function loadClientDetails(clientId) {

        console.log('clientId', clientId);

        let route = '{{ route("admin.clients.getById", ":id") }}';
        route = route.replace(':id', clientId);

        $.ajax({
            url: route,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },

            success: function (data) {

                const name = data.client_type === 'business'
                    ? (data.company_name || '-')
                    : (data.individual_name || '-');

                const email = data.client_type === 'business'
                    ? (data.representative_email || data.ceo_email || '-')
                    : (data.individual_email || '-');

                const phone = data.client_type === 'business'
                    ? (data.representative_mobile || '-')
                    : (data.mobile_number || '-');
                const nationalId = data.national_id || '-';

                // Format created_at properly
                const createdAt = data.created_at 
                    ? new Date(data.created_at).toLocaleString() 
                    : '-';

                $('#clientName').text(name);
                $('#clientNumber').text(data.id || '-');
                $('#clientMobile').text(phone);
                $('#clientEmail').text(email);

                $('#clientEmployeeNumber').text(nationalId);
                $('#clientdatetime').text(createdAt);

                $('.clientDetailsContainer').css('display','grid');
            },

            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Client data not found or server error.');
            }
        });
    }


    // Service type selection
    window.setServiceType = function(type) {
        document.getElementById('service_type_hidden').value = type;
        $('input[name="purpose"]').val('');
        $('input[name="how_many"]').val('');
        $('input[name="ownership_percentage"]').val('');
        $('input[name="government_referral"]').val('');
        $('input[name="other_use_of_report"]').val('');
        $('input[name="delivery_date"]').val('');
    };

    // Add Article Row
    let articleCount = document.querySelectorAll('.article-row').length;
    document.getElementById('add-article-btn').addEventListener('click', function() {
        const container = document.getElementById('articles-container');
        const newArticle = document.createElement('div');
        newArticle.className = 'article-row border rounded p-3 mb-3';
        newArticle.innerHTML = `
            <div class="row g-lg-4 g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="form-label">{{ $cmsTranslations['jewellery_types']->name }} <span class="text-danger">*</span></label>
                    <select class="form-select" name="articles[${articleCount}][jewellery_type_id]">
                        <option value="">Select...</option>
                        @if(isset($jewelryTypes))
                            @foreach($jewelryTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="form-label">{{ $cmsTranslations['total_weight']->name }}<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="articles[${articleCount}][total_weight]" placeholder="Enter weight">
                        <select class="form-select" name="articles[${articleCount}][weight_unit]">
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="form-label">{{ $cmsTranslations['studded_stones']->name }} <span class="text-danger">*</span></label>
                    <select class="form-select" name="articles[${articleCount}][studded_stone_id]">
                        <option value="">Select...</option>
                        @if(isset($studdedStones))
                            @foreach($studdedStones as $stone)
                                <option value="{{ $stone->id }}">{{ $stone->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Pictures Upload Section -->
                <div class="col-12">
                    <label class="form-label">{{ $cmsTranslations['pictures']->name }}</label>
                    <div id="pictures-container-${articleCount}">
                        <div class="picture-row mb-3">
                            <div class="d-flex gap-lg-4 gap-3 align-items-center file-checkbox-group">
                                <div class="input-group">
                                    <input class="form-control picture-file" type="file" name="articles[${articleCount}][images][0][file]">
                                    <input type="text" class="form-control" name="articles[${articleCount}][images][0][name]" placeholder="Picture description">
                                </div>
                                <div class="form-check lg">
                                    <input class="form-check-input" type="checkbox" name="articles[${articleCount}][images][0][for_testing]" id="ForTesting-${articleCount}-0" value="1">
                                    <label class="form-check-label text-nowrap" for="ForTesting-${articleCount}-0">{{ $cmsTranslations['for_testing']->name }}</label>
                                </div>
                                <div class="form-check lg">
                                    <input class="form-check-input" type="checkbox" name="articles[${articleCount}][images][0][for_valuation_report]" id="ForvalReport-${articleCount}-0" value="1">
                                    <label class="form-check-label text-nowrap" for="ForvalReport-${articleCount}-0">{{ $cmsTranslations['for_valuation_report']->name }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn link align-items-center d-inline-flex gap-2 p-0 add-picture" data-article-index="${articleCount}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5V19"/><path d="M5 12H19"/>
                        </svg>
                        {{ $cmsTranslations['add_new_picture']->name }}
                    </button>
                </div>

                <!-- Attachments Section -->
                <div class="col-lg-6 col-md-12">
                    <label class="form-label">{{ $cmsTranslations['article_belongings']->name }}</label>
                    <input class="form-control" type="file" name="articles[${articleCount}][article_belonging_file]">
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="form-label">{{ $cmsTranslations['previous_valuation_report']->name }}</label>
                    <input class="form-control" type="file" name="articles[${articleCount}][previous_valuation_report]">
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="form-label">{{ $cmsTranslations['invoices_related']->name }}</label>
                    <input class="form-control" type="file" name="articles[${articleCount}][invoice_file]">
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="form-label">{{ $cmsTranslations['attachment']->name }}</label>
                    <input class="form-control" type="file" name="articles[${articleCount}][attachment_file]">
                </div>
                <div class="col-12">
                    <label class="form-label">{{ $cmsTranslations['comment']->name }}</label>
                    <textarea class="form-control" placeholder="Enter here" rows="3" name="articles[${articleCount}][comment]"></textarea>
                </div>
            </div>

            <div class="mt-3 text-end">
                <button type="button" class="btn btn-sm btn-danger remove-article">
                    <i class="fas fa-trash"></i> {{ $cmsTranslations['remove_article']->name }}
                </button>
            </div>
        `;
        container.appendChild(newArticle);
        articleCount++;
        attachArticleListeners();
    });

    // Add Picture Row
    function attachArticleListeners() {
        document.querySelectorAll('.add-picture').forEach(btn => {
            btn.removeEventListener('click', addPictureRow);
            btn.addEventListener('click', addPictureRow);
        });

        document.querySelectorAll('.remove-article').forEach(btn => {
            btn.removeEventListener('click', removeArticle);
            btn.addEventListener('click', removeArticle);
        });

        document.querySelectorAll('.remove-picture').forEach(btn => {
            btn.removeEventListener('click', removePicture);
            btn.addEventListener('click', removePicture);
        });
    }

    function addPictureRow(e) {
        e.preventDefault();
        const articleIndex = this.dataset.articleIndex;
        const container = document.getElementById(`pictures-container-${articleIndex}`);
        const pictureCount = container.querySelectorAll('.picture-row').length;

        const newPicture = document.createElement('div');
        newPicture.className = 'picture-row mb-3';
        newPicture.innerHTML = `
            <div class="d-flex gap-lg-4 gap-3 align-items-center file-checkbox-group">
                <!-- No ID field for new images -->
                
                <div class="input-group">
                    <input class="form-control picture-file" type="file" name="articles[${articleIndex}][images][${pictureCount}][file]">
                    <input type="text" class="form-control" name="articles[${articleIndex}][images][${pictureCount}][name]" placeholder="Picture description">
                </div>
                <div class="form-check lg">
                    <input class="form-check-input" type="checkbox" name="articles[${articleIndex}][images][${pictureCount}][for_testing]" id="ForTesting-${articleIndex}-${pictureCount}" value="1">
                    <label class="form-check-label text-nowrap" for="ForTesting-${articleIndex}-${pictureCount}">{{ $cmsTranslations['for_testing']->name }}</label>
                </div>
                <div class="form-check lg">
                    <input class="form-check-input" type="checkbox" name="articles[${articleIndex}][images][${pictureCount}][for_valuation_report]" id="ForvalReport-${articleIndex}-${pictureCount}" value="1">
                    <label class="form-check-label text-nowrap" for="ForvalReport-${articleIndex}-${pictureCount}">{{ $cmsTranslations['for_valuation_report']->name }}</label>
                </div>
                <button type="button" class="btn btn-sm btn-danger remove-picture" title="Delete this picture">{{ $cmsTranslations['remove']->name }}</button>
            </div>
        `;
        container.appendChild(newPicture);
        attachArticleListeners();
    }

    function removeArticle(e) {
        e.preventDefault();
        if(document.querySelectorAll('.article-row').length > 1) {
            this.closest('.article-row').remove();
        } else {
            alert('You must have at least one article');
        }
    }

    function removePicture(e) {
        e.preventDefault();
        const pictureRow = this.closest('.picture-row');
        const container = this.closest('[id^="pictures-container-"]');
        const pictureId = this.dataset.pictureId;
        const visibleRows = [...container.querySelectorAll('.picture-row')].filter(row => row.offsetParent !== null);
        // Check if this is an existing image (has an ID)
        if (pictureId && visibleRows.length > 1) {
            // Add a hidden field to mark this image for deletion
            const deleteField = document.createElement('input');
            deleteField.type = 'hidden';
            deleteField.name = 'articles[' + container.id.replace('pictures-container-', '') + '][images_to_delete][]';
            deleteField.value = pictureId;
            pictureRow.appendChild(deleteField);

            // Hide the row visually (mark for deletion)
            pictureRow.style.opacity = '0.5';
            pictureRow.style.textDecoration = 'line-through';
            this.disabled = true;
            this.textContent = 'Marked for deletion';
            pictureRow.style.display = 'none';
        } else {
            // New image not yet saved - just remove the row
            if(visibleRows.length > 1) {
                pictureRow.remove();
            } else {
                alert('You must have at least one picture per article');
            }
        }
    }

    // Initial listeners
    attachArticleListeners();
});
document.addEventListener("DOMContentLoaded", function () {

    const serviceTypeHidden = document.getElementById('service_type_hidden');

    const valuationTab = document.getElementById('Valuation');
    const consultationTab = document.getElementById('Consultation');

    function toggleFields() {

        const type = serviceTypeHidden.value;

        const valuationInputs = valuationTab.querySelectorAll('input, select, textarea');
        const consultationInputs = consultationTab.querySelectorAll('input, select, textarea');

        // ---------- VALUATION ACTIVE ----------
        if (type === "valuation") {

            valuationInputs.forEach(el => {
                el.disabled = false;
            });

            consultationInputs.forEach(el => {
                el.value = '';
                el.disabled = true;
            });

        } 
        // ---------- CONSULTATION ACTIVE ----------
        else {

            consultationInputs.forEach(el => {
                el.disabled = false;
            });

            valuationInputs.forEach(el => {
                el.value = '';
                el.disabled = true;
            });
        }
    }

    // Called from your button click
    window.setServiceType = function(type){
        serviceTypeHidden.value = type;
        if (type === 'valuation') {
            $('.valuation-content').removeClass('d-none').show();
        } else {
            $('.valuation-content').addClass('d-none').hide();
        }
        toggleFields();
    }

    // Run on page load (edit + validation fail case)
    toggleFields();

});
</script>