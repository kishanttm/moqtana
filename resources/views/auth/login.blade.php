@extends('layouts.guest')


@section('title', __('Login'))

@section('content')
<div class="row justify-content-center h-100">
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <!-- Login Form -->
        <form class="text-white rounded-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-center mb-lg-5 mb-4">
                <img class="mb-lg-5 mb-4 img-fluid" src="{{url('/')}}/assets/images/logo-color.svg" alt="logo" />
                <h3 class="fw-bold">Welcome Back</h3>
                <p class="mb-4 lead">Enter your Email Address and Password.</p>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Email address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="emailAddress" placeholder="Enter your Email" name="email" value="{{ old('email')}}" required autofocus autocomplete="username">
                @if ($errors->has('email'))<span class="text-danger" style="color: red;">{{ $errors->first('email') }}</span>@endif
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="Password" placeholder="Enter your Password" type="password" name="password" required autocomplete="current-password">
                @if (Route::has('password.request'))
                    <a aria-label="Forgot password?" class="small text-secondary text-decoration-none" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div>
                {!! NoCaptcha::display() !!}   {{-- Renders the widget --}}
            </div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger" style="color: red;">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
            <div class="d-grid mt-4">
                <button title="Sign In" type="submit" class="btn btn-accent text-white">Sign In</button>
            </div>
        </form>
    </div>
</div>
{!! NoCaptcha::renderJs() !!}
@endsection