@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>{{ __('Create Your Account') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-user text-success"></i></span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
                                </div>

                                @error('name')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope text-success"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">
                                </div>

                                @error('email')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-lock text-success"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Create a strong password">
                                </div>

                                @error('password')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="text-muted mt-1 d-block">Password must be at least 8 characters</small>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-check-circle text-success"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-user-plus me-2"></i>{{ __('Register Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light p-3 text-center">
                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-success fw-bold">Login here</a></p>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small">By registering, you agree to RestaurantBookGH's Terms of Service and Privacy Policy</p>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: none;
    }

    .btn-success {
        background-color: #22c55e;
        border-color: #22c55e;
    }

    .btn-success:hover {
        background-color: #16a34a;
        border-color: #16a34a;
    }

    .text-success {
        color: #22c55e !important;
    }

    .input-group-text {
        border: none;
    }

    .form-control {
        border-left: none;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
        border-left: none;
    }

    .form-check-input:checked {
        background-color: #22c55e;
        border-color: #22c55e;
    }
</style>
@endsection
