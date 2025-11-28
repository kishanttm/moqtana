@extends('layouts.app')
@section('title', __('Front Desk'))
@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['front_desk']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['front_desk']->name }}</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.service-orders.create') }}" class="btn btn-lg btn-primary align-items-center d-inline-flex gap-2 fs-18">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 5V19"/>
            <path d="M5 12H19"/>
        </svg>
        {{ $cmsTranslations['create_service_order']->name }}
    </a>
</div>
<div class="row">
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <table class="Data_Table table align-middle mb-0 w-100 table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="py-2">{{ $cmsTranslations['service_order']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['id']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['client_name']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['type']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['gjp_count']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['date']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['status']->name }}</th>
                            <th class="py-2">{{ $cmsTranslations['action']->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceOrders as $order)
                            <tr>
                                <td class="ps-3">
                                    {{ $order->service_order_number ?? ''}}
                                </td>
                                <td>
                                    {{ $order->order_id ?? '' }}
                                </td>
                                <td>
                                    @if($order->client && $order->client->client_type == 'individual')
                                        {{ $order->client->individual_name ?? '-'}}
                                    @elseif($order->client && $order->client->client_type == 'business')
                                        {{ $order->client->company_name ?? '-'}}
                                    @endif
                                </td>
                                <td>
                                    {{ ucfirst($order->service_type) }}
                                </td>
                                <td>
                                    {{ $order->articles->count() ?? '' }}
                                </td>
                                <td>
                                    {{ $order->created_at?->format('d M Y') ?? '-' }}
                                </td>
                                <td>
                                    {{ ucfirst($order->status) }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.service-orders.show', $order) }}" class="btn btn-sm btn-secondary align-items-center d-inline-flex" title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    @if(auth()->user()->hasRole('superadmin'))
                                        <a href="{{ route('admin.service-orders.edit', $order) }}" class="btn btn-sm btn-secondary align-items-center d-inline-flex" title="Edit">
                                            <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                                <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                                <path d="M13 2.81824L16 5.54551"/>
                                            </svg>
                                        </a>
                                    @elseif(!$order->is_submited)
                                        <a href="{{ route('admin.service-orders.edit', $order) }}" class="btn btn-sm btn-secondary align-items-center d-inline-flex" title="Edit">
                                            <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                                <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                                <path d="M13 2.81824L16 5.54551"/>
                                            </svg>
                                        </a>
                                    @endif
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V9C19 8.46957 18.7893 7.96086 18.4142 7.58579C18.0391 7.21071 17.5304 7 17 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H5"/>
                                            <path d="M15 7V3C15 2.46957 14.7893 1.96086 14.4142 1.58579C14.0391 1.21071 13.5304 1 13 1H7C6.46957 1 5.96086 1.21071 5.58579 1.58579C5.21071 1.96086 5 2.46957 5 3V7"/>
                                            <path d="M5 13C5 12.4696 5.21071 11.9609 5.58579 11.5858C5.96086 11.2107 6.46957 11 7 11H13C13.5304 11 14.0391 11.2107 14.4142 11.5858C14.7893 11.9609 15 12.4696 15 13V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H7C6.46957 19 5.96086 18.7893 5.58579 18.4142C5.21071 18.0391 5 17.5304 5 17V13Z"/>
                                        </svg>
                                    </button>
                                    @if ($order->is_signed && !$order->is_submited)
                                        <button class="btn btn-sm btn-danger submit-order" data-id="{{ $order->id }}">{{ $cmsTranslations['submit']->name }}</button>
                                    @elseif (!$order->is_signed && !$order->is_submited)
                                        <button class="btn btn-sm btn-primary open-signature"  data-id="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#SignatureModal">{{ $cmsTranslations['e_signature']->name }}</button>
                                    @endif
                                    {{-- <form action="{{ route('admin.service-orders.destroy', $order) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this service order?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-4 text-center text-gray-500">{{ $cmsTranslations['data_not_found']->name }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($serviceOrders->hasPages())
                    <ul class="pagination justify-content-end gap-1 flex-wrap mb-0 pt-3">
                        <!-- Prev -->
                        <li class="page-item {{ $serviceOrders->onFirstPage() ? 'disabled' : '' }}"> <a class="page-link rounded-1 lh-1"  href="{{ $serviceOrders->previousPageUrl() }}"><svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.3539 1.33737C11.4005 1.37511 11.4374 1.41994 11.4626 1.46929C11.4878 1.51865 11.5008 1.57156 11.5008 1.62499C11.5008 1.67843 11.4878 1.73134 11.4626 1.7807C11.4374 1.83005 11.4005 1.87488 11.3539 1.91262L5.70692 6.49999L11.3539 11.0874C11.4478 11.1637 11.5005 11.2671 11.5005 11.375C11.5005 11.4829 11.4478 11.5863 11.3539 11.6626C11.26 11.7389 11.1327 11.7818 10.9999 11.7818C10.8671 11.7818 10.7398 11.7389 10.6459 11.6626L4.64592 6.78762C4.59935 6.74988 4.56241 6.70505 4.5372 6.6557C4.512 6.60634 4.49902 6.55343 4.49902 6.49999C4.49902 6.44656 4.512 6.39365 4.5372 6.34429C4.56241 6.29494 4.59935 6.25011 4.64592 6.21237L10.6459 1.33737C10.6924 1.29954 10.7475 1.26952 10.8083 1.24904C10.869 1.22856 10.9342 1.21802 10.9999 1.21802C11.0657 1.21802 11.1308 1.22856 11.1916 1.24904C11.2523 1.26952 11.3075 1.29954 11.3539 1.33737Z" fill="#ADB5BD"/></svg>{{$cmsTranslations['previous']->name}}</a></li>
                        @php
                            $current = $serviceOrders->currentPage();
                            $last = $serviceOrders->lastPage();
                            $start = max(1, $current - 1);
                            $end = min($last, $current + 1);

                            if ($current == 1) $end = min(3, $last);
                            if ($current == $last) $start = max(1, $last - 2);
                        @endphp

                        <!-- pages -->
                        @for ($page = $start; $page <= $end; $page++)
                            @if ($page == $current)
                                <li class="page-item active"><span class="page-link rounded-1 lh-1">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link rounded-1 lh-1" href="{{ $serviceOrders->url($page) }}">{{ $page }}</a></li>
                            @endif
                        @endfor

                        <!-- Next -->
                        <li class="page-item {{ $serviceOrders->hasMorePages() ? '' : 'disabled' }}"> <a class="page-link rounded-1 lh-1"  href="{{ $serviceOrders->nextPageUrl() }}">{{$cmsTranslations['next']->name}}<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.48444 1.23444C3.51927 1.19952 3.56065 1.17181 3.60621 1.1529C3.65177 1.134 3.70061 1.12427 3.74994 1.12427C3.79926 1.12427 3.8481 1.134 3.89366 1.1529C3.93922 1.17181 3.9806 1.19952 4.01544 1.23444L8.51544 5.73444C8.55036 5.76927 8.57807 5.81065 8.59697 5.85621C8.61588 5.90177 8.62561 5.95061 8.62561 5.99994C8.62561 6.04926 8.61588 6.0981 8.59697 6.14366C8.57807 6.18922 8.55036 6.2306 8.51544 6.26544L4.01544 10.7654C3.94502 10.8359 3.84952 10.8754 3.74994 10.8754C3.65036 10.8754 3.55485 10.8359 3.48444 10.7654C3.41402 10.695 3.37446 10.5995 3.37446 10.4999C3.37446 10.4004 3.41402 10.3049 3.48444 10.2344L7.71969 5.99994L3.48444 1.76544C3.44952 1.7306 3.42181 1.68922 3.4029 1.64366C3.384 1.5981 3.37427 1.54926 3.37427 1.49994C3.37427 1.45061 3.384 1.40177 3.4029 1.35621C3.42181 1.31065 3.44952 1.26927 3.48444 1.23444Z" fill="#ADB5BD"/></svg></a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('content-model')
    <!-- Modal: E-signature -->
    <div class="modal fade" id="SignatureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5">{{ $cmsTranslations['service_agreement']->name }}</h3>
                    <ul class="nav nav-pills mb-0 ms-auto border p-1 rounded" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="English-tab" data-bs-toggle="pill" data-bs-target="#English" type="button" role="tab" aria-controls="English" aria-selected="true">English</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="Arabic-tab" data-bs-toggle="pill" data-bs-target="#Arabic" type="button" role="tab" aria-controls="Arabic" aria-selected="false">Arabic</button>
                        </li>
                    </ul>
                    <button type="button" class="btn-close ms-4" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="English" role="tabpanel" aria-labelledby="English-tab" tabindex="0">
                            <div id="english-content">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ $cmsTranslations['add_e_signature']->name }}<span class="text-danger">*</span></label>
                                {{-- <input type="file" class="dropify-Signature"> --}}
                                <canvas id="signaturePadEn" class="border signature-canvas"></canvas>
                                <button type="button" class="btn btn-sm btn-danger mt-2" id="clearSignatureEn">{{ $cmsTranslations['clear']->name }}</button>
                            </div>
                            <div class="align-items-center d-flex">
                                <div class="form-check fs-2">
                                    <input class="form-check-input" type="checkbox" value="" id="agree_en">
                                    <label class="form-check-label"></label>
                                </div>
                                <span><a class="link" href="#">{{ $cmsTranslations['sign_terms_and_conditions']->name }}</a></span>
                            </div>
                        </div>
                        <div class="tab-pane fade f-arabic" id="Arabic" role="tabpanel" aria-labelledby="Arabic-tab" tabindex="0">
                            <div id="arabic-content">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ $cmsTranslations['add_e_signature']->name }} <span class="text-danger">*</span></label>
                                {{-- <input type="file" class="dropify-Signature"> --}}
                                <canvas id="signaturePadAr" class="border signature-canvas"></canvas>
                                <button type="button" class="btn btn-sm btn-danger mt-2" id="clearSignatureEn">{{ $cmsTranslations['clear']->name }}</button>
                            </div>
                            <div class="align-items-center d-flex">
                                <div class="form-check fs-2">
                                    <input class="form-check-input" type="checkbox" value="" id="agree_ar">
                                    <label class="form-check-label"></label>
                                </div>
                                <span><a class="link" href="#">{{ $cmsTranslations['sign_terms_and_conditions']->name }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-0 justify-content-start modal-footer">
                    <button type="button" class="btn btn-big btn-primary" id="uploadSignatureBtn">{{ $cmsTranslations['upload']->name }}</button>
                    <button type="button" class="btn btn-big btn-secondary" data-bs-dismiss="modal">{{ $cmsTranslations['cancel']->name }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        let signaturePadEn = null;
        let signaturePadAr = null;

        $('#SignatureModal').on('shown.bs.modal', function () {

            function initSignaturePad(canvasId) {
                let canvas = document.getElementById(canvasId);
                if (!canvas) return null; // Prevent error

                // Only initialize if canvas is visible
                if ($(canvas).is(':visible')) {
                    const ratio = Math.max(window.devicePixelRatio || 1, 1);
                    let width = canvas.offsetWidth;
                    let height = canvas.offsetHeight;

                    if (width === 0) width = 500;   // fallback
                    if (height === 0) height = 200; // fallback

                    canvas.width = width * ratio;
                    canvas.height = height * ratio;
                    canvas.getContext("2d").scale(ratio, ratio);

                    return new SignaturePad(canvas, { backgroundColor: "white" });
                }
                return null;
            }

            // Initialize English Pad (visible first)
            signaturePadEn = initSignaturePad("signaturePadEn");

            // Initialize Arabic pad only when user opens Arabic tab
            $('#Arabic-tab').one('shown.bs.tab', function () {
                signaturePadAr = initSignaturePad("signaturePadAr");
            });
        });

        // Clear Buttons
        $('#clearSignatureEn').click(() => signaturePadEn && signaturePadEn.clear());
        $('#clearSignatureAr').click(() => signaturePadAr && signaturePadAr.clear());

        $(document).on('click', '#uploadSignatureBtn', function () {
            let activeTab = $('.tab-pane.active').attr('id');  // English OR Arabic
            let orderId = $('.open-signature').data('id');     // Order ID
            let pad = activeTab === 'English' ? signaturePadEn : signaturePadAr;
            let termsCheck = activeTab === 'English' ? $('#agree_en').is(':checked') : $('#agree_ar').is(':checked');

            // Validate signature
            if (pad.isEmpty()) {
                Swal.fire({
                    html: `
                        <div class="border-bottom modal-header d-flex justify-content-between">
                            <h3 class="modal-title fs-5 fw-bold">Signature Required!</h3>
                            <button type="button" class="btn-close"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <h5 class="fw-bold mb-4">Please sign before uploading.</h5>
                        </div>
                    `,
                    timer: 2000,
                    didOpen: () => {
                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                        if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                    }
                });
                return;
            }

            if (!termsCheck) {
                Swal.fire({
                    html: `
                        <div class="border-bottom modal-header d-flex justify-content-between">
                            <h3 class="modal-title fs-5 fw-bold">Terms Required!</h3>
                            <button type="button" class="btn-close"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <h5 class="fw-bold mb-4">You must accept the Terms & Conditions.</h5>
                        </div>
                    `,
                    timer: 2000,
                    didOpen: () => {
                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                        if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                    }
                });
                return;
            }

            // Convert signature to PNG
            let signatureImage = pad.toDataURL("image/png");

            let formData = new FormData();
            formData.append("signature", signatureImage);
            formData.append("order_id", orderId);
            formData.append("language", activeTab);
            formData.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('admin.service-orders.upload-signature') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.fire({
                        html: `
                            <div class="border-bottom modal-header d-flex justify-content-between">
                                <h3 class="modal-title fs-5 fw-bold">${res.status ? 'Success!' : 'Error!'}</h3>
                                <button type="button" class="btn-close"></button>
                            </div>
                            <div class="modal-body pb-0">
                                <h5 class="fw-bold mb-4">${res.message}</h5>
                            </div>
                        `,
                        timer: 2000,
                        didOpen: () => {
                            const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                            if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                        }
                    });

                    if (res.status) {
                        $('#SignatureModal').modal('hide');
                        setTimeout(() => {
                            location.reload();
                        }, 1200);
                    } 
                        
                },
                error: function() {
                    Swal.fire({
                        html: `
                            <div class="border-bottom modal-header d-flex justify-content-between">
                                <h3 class="modal-title fs-5 fw-bold">Failed!</h3>
                                <button type="button" class="btn-close"></button>
                            </div>
                            <div class="modal-body pb-0">
                                <h5 class="fw-bold mb-4">Something went wrong.</h5>
                            </div>
                        `,
                        timer: 2000,
                        didOpen: () => {
                            const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                            if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                        }
                    });
                }
            });
        });

        // DataTable JS
        $(document).ready(function () {
            var table = $('.Data_Table').addClass('nowrap').DataTable({
                responsive: true,
                bFilter: false,
                bInfo: false,
                ordering: true,
                paging: false,
                dom: '<"float-left"B><"float-right"f>rt<"row d-footer"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            });
            $(document).on('click', '.open-signature', function () {
                let orderId = $(this).data('id');

                // Default English tab active
                $('#English-tab').addClass('active');
                $('#Arabic-tab').removeClass('active');
                $('#English').addClass('show active');
                $('#Arabic').removeClass('show active');

                // Show loading text
                $('#english-content').html("Loading...");
                $('#arabic-content').html("Loading...");
                // AJAX request
                $.ajax({
                    url: "{{ route('admin.service-orders.signature-content', ':id') }}".replace(':id', orderId),
                    type: "GET",
                    success: function (res) {
                        if(res.status) {
                            // Fill modal with dynamic content
                            $('#english-content').html(res.contract_en);
                            $('#arabic-content').html(res.contract_ar);
                        } else {
                            Swal.fire({
                                html: `
                                    <div class="border-bottom modal-header d-flex justify-content-between">
                                        <h3 class="modal-title fs-5 fw-bold">Not Found!</h3>
                                        <button type="button" class="btn-close"></button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <h5 class="fw-bold mb-4">`+res.message+`</h5>
                                    </div>
                                `,
                                showConfirmButton: false, 
                                timer: 2000
                            });
                        }
                    },
                    error: function () {
                        $('#english-content').html("<p class='text-danger'>Failed to load content.</p>");
                    }
                });
                $('.dropify-Signature').dropify({
                    messages: {
                    default: 'Signature here',
                    replace: 'Signature here',
                    remove: 'Supprimer',
                    error: 'Upload Signature here File'
                    }
                });
            });
            // SUBMIT ORDER
            $(document).on('click', '.submit-order', function () {
                let orderId = $(this).data('id');

                Swal.fire({
                    html: `
                        <div class="border-bottom modal-header d-flex justify-content-between">
                            <h3 class="modal-title fs-5 fw-bold">Are you sure want to submit this order?</h3>
                            <button type="button" class="btn-close"></button>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: "Yes, Submit",
                    cancelButtonText: "Cancel",
                    didOpen: () => {
                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                        if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                    }
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "{{ route('admin.service-orders.submit') }}",
                            type: "POST",
                            data: {
                                order_id: orderId,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(res) {
                                var title= res.status ? "Success!" : "Error!";
                                
                                Swal.fire({
                                    html: `
                                        <div class="border-bottom modal-header d-flex justify-content-between">
                                            <h3 class="modal-title fs-5 fw-bold">`+title+`</h3>
                                            <button type="button" class="btn-close"></button>
                                        </div>
                                        <div class="modal-body pb-0">
                                            <h5 class="fw-bold mb-4">`+res.message+`.</h5>
                                        </div>
                                    `,
                                    timer: 2000,
                                    showConfirmButton: false,
                                    didOpen: () => {
                                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                                        if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                                    }
                                });

                                if (res.status) {
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1200);
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    html: `
                                        <div class="border-bottom modal-header d-flex justify-content-between">
                                            <h3 class="modal-title fs-5 fw-bold">Failed!</h3>
                                            <button type="button" class="btn-close"></button>
                                        </div>
                                        <div class="modal-body pb-0">
                                            <h5 class="fw-bold mb-4">Something went wrong.</h5>
                                        </div>
                                    `,
                                    timer: 2000,
                                    didOpen: () => {
                                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');
                                        if (closeBtn) closeBtn.addEventListener('click', () => Swal.close());
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
</script>
@endpush