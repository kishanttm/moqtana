@extends('layouts.guest')

@section('title', __('Reset Password'))

@section('content')
<div class="row justify-content-center h-100">
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <!-- Login Form -->
        <form class="text-white rounded-5" method="POST" action="{{ route('password.store') }}">
            @csrf
            <div class="text-center mb-lg-5 mb-4">
                <img class="mb-lg-5 mb-4 img-fluid" src="{{url('/')}}/assets/images/logo-color.svg" alt="logo" />
                <h3 class="fw-bold">Change Password</h3>
                <p class="mb-4 lead">Enter and confirm your new password.</p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email"  name="email" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" placeholder="Enter email">
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label text-white">New Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="newPassword" name="password" required autocomplete="new-password" placeholder="Enter New Password">
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="newPasswordConfirm" class="form-label text-white">Confirm New Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="newPasswordConfirm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
            </div>
            <div class="d-grid mt-4">
                <button class="btn btn-accent text-white" type="submit"> Update Password </button>
            </div>
        </form>
    </div>
</div>
@endsection


