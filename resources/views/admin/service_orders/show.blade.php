@extends('layouts.app')
@section('title', __('View Service Order'))
@section('content')
<!-- breadcrumb -->
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['view_service_order']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.service-orders.index') }}" class="link">{{ $cmsTranslations['front_desk']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['view_service_order']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row g-lg-4 g-3">
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="row g-lg-4 g-3">
                    @if($serviceOrder->client && $serviceOrder->client->client_type === 'individual')
                        <div class="col-12">
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['choose_client']->name }}</label>
                                <div class="input-group">
                                    <select class="form-select">
                                        <option selected>{{ $serviceOrder->client->individual_name ?? ''}}</option>
                                    </select>
                                    <a class="btn btn-accent text-white d-flex align-items-center" type="button" href="{{ route('clients.create') }}">{{ $cmsTranslations['add_client']->name }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['client_name']->name }}</p>
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
                        <!-- Business -->
                    @elseif($serviceOrder->client && $serviceOrder->client->client_type === 'business')
                        <div class="col-12">
                            <div class="col-lg-6">
                                <label class="form-label">{{ $cmsTranslations['choose_client']->name }}</label>
                                <div class="input-group">
                                    <select class="form-select">
                                        <option selected>{{ $serviceOrder->client->company_name ?? ''}}</option>
                                    </select>
                                    <button class="btn btn-accent text-white" type="button">{{ $cmsTranslations['add_client']->name }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['client_name']->name }}</p>
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
                    @else
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['client_data_not_found']->name }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="row g-lg-4 g-3">
                    <div class="col-lg-4 col-md-6">
                        <p class="text-muted mb-2">{{ $cmsTranslations['choose_service']->name }}</p>
                        <h5 class="fs-18 mb-0">{{ ucfirst($serviceOrder->service_type) ?? '-' }}</h5>
                    </div>
                    @if($serviceOrder->service_type == 'consultation')
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['consultation_type']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->consultation  ?? '-' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['delivery_date']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->delivery_date)->format('d M Y')  ?? '-' }}</h5>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['purpose_of_valuation']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->purposeOfValuation->name ?? "-" }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['other_owners']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->has_other_owners ? 'Yes' : 'No' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['how_many']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->how_many  ?? '-' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['your_percentage']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->ownership_percentage  ?? '-' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['government_referral']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->government_referral  ?? '-' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['any_other_use']->name }} </p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->other_use_of_report  ?? '-' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['delivery_date']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ \Carbon\Carbon::parse($serviceOrder->delivery_date)->format('d M Y')  ?? '-' }}</h5>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p class="text-muted mb-2">{{ $cmsTranslations['comment']->name }}</p>
                            <h5 class="fs-18 mb-0">{{ $serviceOrder->comment  ?? '-' }}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($serviceOrder->articles && $serviceOrder->articles->count() > 0)
        @foreach($serviceOrder->articles as $article)
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h5>{{ $cmsTranslations['gemstones_jewelry_pc']->name }}</h5>
                        <div class="row g-lg-4 g-3">
                            <div class="col-lg-4 col-md-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['jewellery_types']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $article->jewelryType->name ?? '-' }}</h5>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['total_weight']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $article->total_weight ?? '-' }} {{ $article?->weightUnit?->name ?? '-' }}</h5>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p class="text-muted mb-2">{{ $cmsTranslations['studded_stones']->name }}</p>
                                <h5 class="fs-18 mb-0">{{ $article?->studdedStone?->name ?? ''}}</h5>
                            </div>
                            <div class="col-12">
                                <ul class="list-unstyled">
                                    @foreach ($article->images as $key => $image)
                                        <li class="d-flex gap-lg-4 gap-2 align-items-center mb-4 flex-wrap">
                                            <span class="image-name text-truncate">{{ $cmsTranslations['pictures']->name }} {{ $key + 1 }}</span>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a class="btn btn-sm btn-accent text-white" href="{{ asset('storage/' . $image->image_path) }}" download>{{ $cmsTranslations['download']->name }}</a>
                                                <a class="btn btn-sm btn-secondary text-white" href="{{ asset('storage/' . $image->image_path) }}" target="_blank">{{ $cmsTranslations['preview']->name }}</a>
                                            </div>
                                            <div class="d-flex gap-4 align-items-center">
                                                <div class="form-check lg">
                                                    <input class="form-check-input" type="checkbox" value="" id="ForTesting-1" {{ $image->for_testing == '1' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label text-nowrap">{{ $cmsTranslations['for_testing']->name }}</label>
                                                </div>
                                                <div class="form-check lg">
                                                    <input class="form-check-input" type="checkbox" value="" id="ForvaluationReport-1" {{ $image->for_valuation_report == '1' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label text-nowrap">{{ $cmsTranslations['for_valuation_report']->name }}</label>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="col-12">
        <div class="page-action mt-2">
            @if(auth()->user()->hasRole('superadmin'))
                <a class="btn btn-big btn-accent text-white" href="{{ route('admin.service-orders.edit', $serviceOrder) }}">{{ $cmsTranslations['edit']->name }}</a>
            @elseif(!$serviceOrder->is_submited)
                <a class="btn btn-big btn-accent text-white" href="{{ route('admin.service-orders.edit', $serviceOrder) }}">{{ $cmsTranslations['edit']->name }}</a>
            @endif
            <a class="btn btn-big btn-danger delete-client-button" data-url="{{ route('admin.service-orders.destroy', $serviceOrder) }}" data-client="{{ $serviceOrder }}">{{ $cmsTranslations['delete']->name }}</a>
            <a class="btn btn-big btn-secondary btn-cancel" href="{{ route('admin.service-orders.index') }}">{{ $cmsTranslations['cancel']->name }}</a>
        </div>
    </div>
</div>
<script>
    const deleteButtons = document.querySelectorAll('.delete-client-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const deleteUrl = this.dataset.url;
                const deleteclient = JSON.parse(this.dataset.client);
                const name = deleteclient.client_type == "individual" ? deleteclient.individual_name : deleteclient.company_name;

                Swal.fire({
                    title: name,
                    html: `
                    <div class="border-bottom modal-header d-flex justify-content-between">
                        <h3 class="modal-title fs-5 fw-bold">Delete</h3>
                        <button type="button" class="btn-close"></button>
                    </div>
                    <div class="modal-body pb-0">
                        <h5 class="fw-bold mb-4">Are you sure you want to delete this service order?</h5>
                        <label class="form-label">Reason why to cancel <span class="text-danger">*</span></label>
                        <textarea id="delete-reason" row="2" class="form-control" placeholder="Enter delete reason..."></textarea>
                    </div>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete',
                    preConfirm: () => {
                        const reason = document.getElementById('delete-reason').value;

                        if (!reason.trim()) {
                            Swal.showValidationMessage('Delete reason is required');
                        }

                        return reason;
                    },
                    didOpen: () => {
                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                        if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                _method: 'DELETE',
                                delete_reason: result.value
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    html: `
                                        <div class="border-bottom modal-header d-flex justify-content-between">
                                            <h3 class="modal-title fs-5 fw-bold">Deleted!</h3>
                                            <button type="button" class="btn-close"></button>
                                        </div>
                                        <div class="modal-body pb-0">
                                            <h5 class="fw-bold mb-4">`+data.message+`</h5>
                                        </div>
                                        `,
                                    showConfirmButton: false, 
                                    timer: 1000
                                });
                                // Optionally remove the row or refresh the UI
                                window.location.href = "{{ route('admin.service-orders.index') }}";
                            } else {
                                Swal.fire({
                                    html: `
                                        <div class="border-bottom modal-header d-flex justify-content-between">
                                            <h3 class="modal-title fs-5 fw-bold">Error!</h3>
                                            <button type="button" class="btn-close"></button>
                                        </div>
                                        <div class="modal-body pb-0">
                                            <h5 class="fw-bold mb-4">`+data.message+`</h5>
                                        </div>
                                        `,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                html: `
                                    <div class="border-bottom modal-header d-flex justify-content-between">
                                        <h3 class="modal-title fs-5 fw-bold">Error!</h3>
                                        <button type="button" class="btn-close"></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <h5 class="fw-bold mb-4">An unexpected error occurred.</h5>
                                    </div>
                                    `,
                                showConfirmButton: false,
                                timer: 1000
                            });
                        });
                    }
                });
            });
        });
</script>
@endsection
