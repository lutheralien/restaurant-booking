@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-key me-2"></i>{{ __('Reset Your Password') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success bg-light border-start border-success border-4 text-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center mb-4">
                        <div class="reset-icon mb-3">
                            <i class="fas fa-unlock-alt fa-3x text-success"></i>
                        </div>
                        <p class="text-muted">
                            {{ __('Enter your email address and we\'ll send you a link to reset your password.') }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope text-success"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your registered email">
                                </div>

                                @error('email')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-paper-plane me-2"></i>{{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light p-3 text-center">
                    <p class="mb-0">Remember your password? <a href="{{ route('login') }}" class="text-success fw-bold">Login here</a></p>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small"><i class="fas fa-shield-alt me-1"></i>We prioritize the security of your account information</p>
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

    .reset-icon {
        background-color: rgba(34, 197, 94, 0.1);
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .alert-success {
        background-color: rgba(34, 197, 94, 0.1) !important;
        border-color: #22c55e !important;
    }
</style>
@endsection
