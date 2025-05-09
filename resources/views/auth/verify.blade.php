@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-envelope-open-text me-2"></i>{{ __('Verify Your Email Address') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('resent'))
                        <div class="alert alert-success bg-light border-start border-success border-4 text-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div class="text-center mb-4">
                        <div class="verification-icon mb-3">
                            <i class="fas fa-envelope fa-3x text-success"></i>
                        </div>
                        <h5 class="mb-3">{{ __('Please verify your email address') }}</h5>
                        <p class="text-muted">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email, you can request another one.') }}
                        </p>
                    </div>

                    <div class="text-center mt-4">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane me-2"></i>{{ __('Resend Verification Email') }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-footer bg-light p-3 text-center">
                    <p class="mb-0 text-muted small">
                        <i class="fas fa-info-circle me-1"></i>Still having trouble? Contact our support team for assistance.
                    </p>
                </div>
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

    .verification-icon {
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
