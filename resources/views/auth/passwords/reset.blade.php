@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-lock-open me-2"></i>{{ __('Create New Password') }}</h4>
                </div>

                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="reset-icon mb-3">
                            <i class="fas fa-shield-alt fa-3x text-success"></i>
                        </div>
                        <p class="text-muted">
                            {{ __('Please create a new password for your account.') }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope text-success"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-lock text-success"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your new password">
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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your new password">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-check me-2"></i>{{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light p-3 text-center">
                    <p class="mb-0">After resetting, you'll be able to <a href="{{ route('login') }}" class="text-success fw-bold">login with your new password</a></p>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small"><i class="fas fa-info-circle me-1"></i>For security reasons, this link will expire in 60 minutes</p>
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
</style>
@endsection
