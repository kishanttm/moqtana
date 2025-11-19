@extends('layouts.app')

@section('title', __('View User'))

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['view_user']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}" class="link">{{ $cmsTranslations['user_list']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['view_user']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row g-lg-4 g-3">
    <div class="col-12">
        <div class="card rounded-4">
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                        <div class="col-xl-3 col-lg-4 col-md-5">
                            <span class="text-muted">{{ $cmsTranslations['name']->name }} :</span>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <span>{{ $user->name ?? '-' }}</span>
                        </div>
                    </li>
                    <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                        <div class="col-xl-3 col-lg-4 col-md-5">
                            <span class="text-muted">{{ $cmsTranslations['email_address']->name }} :</span>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <span>{{ $user->email ?? '-' }}</span>
                        </div>
                    </li>
                    @if($user->hasRole('user'))
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['valuation_membership_number']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $user->valuation_membership_number ?? '-' }}</span>
                            </div>
                        </li>
                        <li class="row g-lg-4 g-3 mb-xl-4 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['valuation_type']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <span>{{ $user->valuation_type ?? '-' }}</span>
                            </div>
                        </li>
                    @endif
                    @if($user->signature_path)
                        <li class="row g-lg-4 g-3 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['signature_picture']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <a class="btn btn-sm btn-accent text-white" href="{{ asset('storage/' . $user->signature_path) }}" download>Download</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ asset('storage/' . $user->signature_path) }}" target="_blank">Preview</a>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if($user->profile_image_path)
                        <li class="row g-lg-4 g-3 mb-3">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <span class="text-muted">{{ $cmsTranslations['profile_image']->name }} :</span>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <a class="btn btn-sm btn-accent text-white" href="{{ asset('storage/' . $user->profile_image_path) }}" download>Download</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ asset('storage/' . $user->profile_image_path) }}" target="_blank">Preview</a>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="page-action mt-2">
            <a class="btn btn-big btn-primary" href="{{ route('admin.users.edit', $user) }}">{{ $cmsTranslations['update']->name }}</a>
            <button class="btn btn-big btn-danger delete-user-button"  data-url="{{ route('admin.users.destroy', $user) }}" data-user="{{ $user->name }}">{{ $cmsTranslations['delete']->name }}</button>
            <a class="btn btn-big btn-secondary btn-cancel" href="{{ url()->previous() }}" type="button">{{ $cmsTranslations['cancel']->name }}</a>
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
                    title: deleteuser,
                    text: "Are your sure you want to delete the user?",
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
                                    title: 'Deleted!',
                                    text: data.message,
                                    showConfirmButton: false, 
                                    timer: 1000
                                });
                                window.location.href = "{{ route('admin.users.index') }}"
                            } else {
                                Swal.fire(
                                    'Error!',
                                    data.message,
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'An unexpected error occurred.',
                            );
                        });
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection
