@extends('layouts.app')


@section('title', __('Dashboard'))

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{$cmsTranslations['user_list']->name}}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{$cmsTranslations['home']->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$cmsTranslations['user_list']->name}}</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-lg btn-primary align-items-center d-inline-flex gap-2 fs-18">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 5V19"/>
            <path d="M5 12H19"/>
        </svg>
        {{$cmsTranslations['add_new_user']->name}}
    </a>
</div>
<div class="row">
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <table class="Data_Table table align-middle mb-0 w-100 table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="py-2">{{$cmsTranslations['user_name']->name}}</th>
                            <th class="py-2">{{$cmsTranslations['roles']->name}}</th>
                            <th class="py-2">{{$cmsTranslations['email_address']->name}}</th>
                            <th class="py-2">{{$cmsTranslations['action']->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name ?? '-' }}</td>
                                <td>{{ ucfirst($user->roles->pluck('name')->join(', ') ?: '—') }}</td>
                                <td>{{ $user->email ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $cmsTranslations['view']->name }}">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $cmsTranslations['edit']->name }}">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </a>
                                    <a class="btn btn-sm btn-danger text-white delete-user-button" data-url="{{ route('admin.users.destroy', $user) }}" data-user="{{ $user->name }}">{{$cmsTranslations['delete']->name }}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 text-center text-gray-500">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($users->hasPages())
                    <ul class="pagination justify-content-end gap-1 flex-wrap mb-0 pt-3">
                        <!-- Prev -->
                        <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}"> <a class="page-link rounded-1 lh-1"  href="{{ $users->previousPageUrl() }}"><svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.3539 1.33737C11.4005 1.37511 11.4374 1.41994 11.4626 1.46929C11.4878 1.51865 11.5008 1.57156 11.5008 1.62499C11.5008 1.67843 11.4878 1.73134 11.4626 1.7807C11.4374 1.83005 11.4005 1.87488 11.3539 1.91262L5.70692 6.49999L11.3539 11.0874C11.4478 11.1637 11.5005 11.2671 11.5005 11.375C11.5005 11.4829 11.4478 11.5863 11.3539 11.6626C11.26 11.7389 11.1327 11.7818 10.9999 11.7818C10.8671 11.7818 10.7398 11.7389 10.6459 11.6626L4.64592 6.78762C4.59935 6.74988 4.56241 6.70505 4.5372 6.6557C4.512 6.60634 4.49902 6.55343 4.49902 6.49999C4.49902 6.44656 4.512 6.39365 4.5372 6.34429C4.56241 6.29494 4.59935 6.25011 4.64592 6.21237L10.6459 1.33737C10.6924 1.29954 10.7475 1.26952 10.8083 1.24904C10.869 1.22856 10.9342 1.21802 10.9999 1.21802C11.0657 1.21802 11.1308 1.22856 11.1916 1.24904C11.2523 1.26952 11.3075 1.29954 11.3539 1.33737Z" fill="#ADB5BD"/></svg>{{$cmsTranslations['previous']->name}}</a></li>
                        @php
                            $current = $users->currentPage();
                            $last = $users->lastPage();
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
                                <li class="page-item"><a class="page-link rounded-1 lh-1" href="{{ $users->url($page) }}">{{ $page }}</a></li>
                            @endif
                        @endfor

                        <!-- Next -->
                        <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}"> <a class="page-link rounded-1 lh-1"  href="{{ $users->nextPageUrl() }}">{{$cmsTranslations['next']->name}}<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.48444 1.23444C3.51927 1.19952 3.56065 1.17181 3.60621 1.1529C3.65177 1.134 3.70061 1.12427 3.74994 1.12427C3.79926 1.12427 3.8481 1.134 3.89366 1.1529C3.93922 1.17181 3.9806 1.19952 4.01544 1.23444L8.51544 5.73444C8.55036 5.76927 8.57807 5.81065 8.59697 5.85621C8.61588 5.90177 8.62561 5.95061 8.62561 5.99994C8.62561 6.04926 8.61588 6.0981 8.59697 6.14366C8.57807 6.18922 8.55036 6.2306 8.51544 6.26544L4.01544 10.7654C3.94502 10.8359 3.84952 10.8754 3.74994 10.8754C3.65036 10.8754 3.55485 10.8359 3.48444 10.7654C3.41402 10.695 3.37446 10.5995 3.37446 10.4999C3.37446 10.4004 3.41402 10.3049 3.48444 10.2344L7.71969 5.99994L3.48444 1.76544C3.44952 1.7306 3.42181 1.68922 3.4029 1.64366C3.384 1.5981 3.37427 1.54926 3.37427 1.49994C3.37427 1.45061 3.384 1.40177 3.4029 1.35621C3.42181 1.31065 3.44952 1.26927 3.48444 1.23444Z" fill="#ADB5BD"/></svg></a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-user-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const deleteUrl = this.dataset.url;
                const deleteuser = this.dataset.user;

                Swal.fire({
                    html: `
                        <div class="border-bottom modal-header d-flex justify-content-between">
                            <h3 class="modal-title fs-5 fw-bold">`+ deleteuser +`</h3>
                            <button type="button" class="btn-close"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <h5 class="fw-bold mb-4">Are your sure you want to delete the user?</h5>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete',
                    didOpen: () => {
                        const closeBtn = Swal.getHtmlContainer().querySelector('.btn-close');

                        if (closeBtn) {
                            closeBtn.addEventListener('click', () => {
                                Swal.close();
                            });
                        }
                    }
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
                                this.closest('tr')?.remove();
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
    });
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

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
    });
</script>
@endpush
@endsection