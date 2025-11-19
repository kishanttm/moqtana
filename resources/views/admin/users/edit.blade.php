@extends('layouts.app')

@section('title', __('Edit User'))

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">{{ $cmsTranslations['edit_user']->name }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}" class="link">{{ $cmsTranslations['user_list']->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['edit_user']->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row g-lg-4 g-3">
    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="row g-lg-3 g-2 mb-3">
                            <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                <span>{{ $cmsTranslations['full_name']->name }} <span class="text-danger">*</span>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-sm-8">
                                <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" placeholder="Enter Name here">
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </li>
                        <li class="row g-lg-3 g-2 mb-3">
                            <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                <span>{{ $cmsTranslations['email_address']->name }} <span class="text-danger">*</span>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-sm-8">
                                <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" placeholder="Enter here">
                                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </li>
                        <li class="row g-lg-3 g-2 mb-3">
                            <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                <span>{{ $cmsTranslations['roles']->name }} <span class="text-danger">*</span>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-sm-8">
                                <select id="role_single" name="role_single"  class="form-select" aria-label="Default select example">
                                    <option value="">-- Select Role --</option>
                                    @foreach($roles as $id => $name)
                                        <option value="{{ $id }}" 
                                            {{ $user->roles->pluck('id')->contains($id) ? 'selected' : '' }}>
                                            {{ ucfirst($name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_single')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </li>
                        <div id="valuationFields" class="{{ $user->hasRole('user') ? '' : 'd-none' }}">
                            <li class="row g-lg-3 g-2 mb-3">
                                <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                    <span>{{ $cmsTranslations['valuation_membership_number']->name }} <span class="text-danger">*</span>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-sm-8">
                                    <input type="text" name="valuation_membership_number" value="{{ old('valuation_membership_number',$user->valuation_membership_number) }}" class="form-control">
                                    @error('valuation_membership_number')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </li>
                            <li class="row g-lg-3 g-2 mb-3">
                                <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                    <span>{{ $cmsTranslations['valuation_type']->name }} <span class="text-danger">*</span>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-sm-8">
                                    <input type="text" name="valuation_type" value="{{ old('valuation_type',$user->valuation_type) }}" class="form-control">
                                    @error('valuation_type')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </li>
                            <li class="row g-lg-3 g-2 mb-3">
                                <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                    <span>{{ $cmsTranslations['signature_picture']->name }} <span class="text-danger">*</span>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-sm-8">
                                    <input type="file" name="signature_path" class="form-control" id="formFile">
                                    @error('signature_path')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </li>
                        </div>
                        <li class="row g-lg-3 g-2 mb-3">
                            <div class="col-xl-3 col-lg-5 col-sm-4 d-flex align-items-center">
                                <span>{{ $cmsTranslations['profile_image']->name }} </span>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-sm-8">
                                <input type="file" name="profile_image_path" class="form-control">
                                @error('profile_image_path')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="page-action mt-2">
                <button class="btn btn-big btn-primary">{{ $cmsTranslations['update']->name }}</button>
                <a class="btn btn-big btn-secondary btn-cancel" href="{{ url()->previous() }}" type="button">{{ $cmsTranslations['cancel']->name }}</a>
            </div>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role_single');
        const valuationFields = document.getElementById('valuationFields');
        const inputs = valuationFields.querySelectorAll('input');

        // ✅ Get the "User" role ID dynamically from backend
        const USER_ROLE_ID = {{ \Spatie\Permission\Models\Role::where('name', 'user')->value('id') ?? 'null' }};

        function toggleValuationFields() {
            const selectedRoleId = parseInt(roleSelect.value);
            const isUser = selectedRoleId === USER_ROLE_ID;

            if (isUser) {
                valuationFields.classList.remove('d-none');
                inputs.forEach(input => input.disabled = false);
            } else {
                valuationFields.classList.add('d-none');
                inputs.forEach(input => {input.disabled = true,input.value = ''});
            }
        }

        roleSelect.addEventListener('change', toggleValuationFields);
        toggleValuationFields(); // Run on page load
    });
</script>
