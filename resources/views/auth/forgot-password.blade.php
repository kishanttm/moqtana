@extends('layouts.guest')

@section('title', __('Forgot Password'))

@section('content')
<div class="row justify-content-center h-100">
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <!-- Login Form -->
        <form class="text-white rounded-5" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="text-center mb-lg-5 mb-4">
                <img class="mb-lg-5 mb-4 img-fluid" src="{{url('/')}}/assets/images/logo-color.svg" alt="logo" />
                <h3 class="fw-bold">Password Reset</h3>
                <p class="mb-4 lead">Enter your Email for Password Reset Link.</p>
            </div>
            <div class="mb-3">
                <label for="emailAddress" class="form-label text-white">Email address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="emailAddress" placeholder="Enter your Email" name="email" :value="old('email')" required autofocus>
                @if ($errors->has('email'))
                    <span class="text-danger" style="color: red;">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="d-grid mt-4">
                <button title="Sign In" type="submit" class="btn btn-accent text-white">Sign In</button>
            </div>
        </form>
    </div>
</div>
@endsection

