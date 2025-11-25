@extends('layouts.app')

@section('title', __('Client Details'))

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['view_client']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}" class="link">{{ $cmsTranslations['clients_list']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['view_client']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row g-lg-4 g-3">
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                @if($client->client_type === 'business')
                    <ul class="list-unstyled mb-0">
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['company_name']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->company_name ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['unified_number']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->unified_number ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['address']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->address_business ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['vat_number']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->vat_number ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['ceo_name']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->ceo_name ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['ceo_email_address']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->ceo_email ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['representative_name']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->representative_name ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['representative_mobile_number']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->representative_mobile ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['representative_email_address']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->representative_email ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['accountant_name']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->accountant_name ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['accountant_mobile_number']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->accountant_mobile ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['accountant_email_address']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->accountant_email ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['documents']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <a class="btn btn-sm btn-accent text-white" href="{{ $client->document_url }}" download>{{ $cmsTranslations['download']->name }}</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ $client->document_url }}" target="_blank">{{ $cmsTranslations['preview']->name }}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @elseif($client->client_type === 'individual')
                    <ul class="list-unstyled mb-0">
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['clients_name']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->individual_name ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['national_id']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->national_id ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['mobile_number']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->mobile_number ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['client_email_address']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->individual_email ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['address']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $client->address ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['documents_delegations']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <a class="btn btn-sm btn-accent text-white" href="{{ $client->document_url }}" download>{{ $cmsTranslations['download']->name }}</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ $client->document_url }}" target="_blank">{{ $cmsTranslations['preview']->name }}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="page-action mt-2">
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-big btn-primary">{{ $cmsTranslations['update']->name }}</a>
            <a class="btn btn-big btn-danger delete-client-button" data-url="{{ route('clients.destroy', $client) }}" data-client="{{ $client }}">{{ $cmsTranslations['delete']->name }}</a>
            <a class="btn btn-big btn-secondary btn-cancel" href="{{ url()->previous() }}" type="button">{{ $cmsTranslations['cancel']->name }}</a>
        </div>
    </div>
</div>
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-client-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const deleteUrl = this.dataset.url;
                const deleteclient = JSON.parse(this.dataset.client);
                const name = deleteclient.client_type == "individual" ? deleteclient.individual_name : deleteclient.company_name;

                Swal.fire({
                    html: `
                        <div class="border-bottom modal-header d-flex justify-content-between">
                            <h3 class="modal-title fs-5 fw-bold">`+ name +`</h3>
                            <button type="button" class="btn-close"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <h5 class="fw-bold mb-4">Are your sure you want to delete the client?</h5>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
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
                                window.location.href = "{{ route('clients.index') }}"
                            } else {
                                Swal.fire({
                                    html: `
                                        <div class="border-bottom modal-header d-flex justify-content-between">
                                            <h3 class="modal-title fs-5 fw-bold">Error!</h3>
                                            <button type="button" class="btn-close"></button>
                                        </div>
                                        <div class="modal-body pb-0">
                                            <h5 class="fw-bold mb-4">${data.message}</h5>
                                        </div>
                                    `,
                                    timer: 1000,

                                    didOpen: () => {
                                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                                        if (closeBtn) {
                                            closeBtn.addEventListener('click', () => {
                                                Swal.close();
                                            });
                                        }
                                    }
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
                                timer: 1000,

                                didOpen: () => {
                                    const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                                    if (closeBtn) {
                                        closeBtn.addEventListener('click', () => {
                                            Swal.close();
                                        });
                                    }
                                }
                            });
                        });
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection


