@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Booking Details</h4>
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : ($booking->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                                <h5 class="alert-heading">
                                    Status: {{ ucfirst($booking->status) }}
                                </h5>
                                @if($booking->status == 'pending')
                                    <p>Your booking is waiting for confirmation from the restaurant.</p>
                                @elseif($booking->status == 'confirmed')
                                    <p>Your booking has been confirmed. You'll receive a reminder email 30 minutes before your reservation.</p>
                                @elseif($booking->status == 'cancelled')
                                    <p>This booking has been cancelled.</p>
                                @elseif($booking->status == 'completed')
                                    <p>This booking has been completed. We hope you enjoyed your meal!</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Restaurant Information</h5>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $booking->restaurant->name }}</h5>
                                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $booking->restaurant->location }}</p>
                                    <p class="card-text"><i class="fas fa-phone"></i> {{ $booking->restaurant->contact_info }}</p>
                                    @if($booking->restaurant->cover_image)
                                        <img src="{{ $booking->restaurant->cover_image }}" class="img-fluid rounded" alt="{{ $booking->restaurant->name }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Booking Details</h5>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong><i class="far fa-calendar-alt"></i> Date:</strong>
                                        {{ $booking->booking_datetime->format('F j, Y') }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong><i class="far fa-clock"></i> Time:</strong>
                                        {{ $booking->booking_datetime->format('g:i A') }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong><i class="fas fa-users"></i> Guests:</strong>
                                        {{ $booking->guests_count }}
                                    </li>
                                    @if($booking->special_requests)
                                        <li class="list-group-item">
                                            <strong><i class="fas fa-comment-alt"></i> Special Requests:</strong>
                                            <p class="mb-0">{{ $booking->special_requests }}</p>
                                        </li>
                                    @endif
                                    <li class="list-group-item">
                                        <strong><i class="far fa-calendar-check"></i> Booking Created:</strong>
                                        {{ $booking->created_at->format('F j, Y g:i A') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if($booking->mealOrders->count() > 0)
                        <h5>Pre-ordered Meals</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price (GHS)</th>
                                        <th>Quantity</th>
                                        <th>Total (GHS)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($booking->mealOrders as $order)
                                        <tr>
                                            <td>
                                                @if($order->foodItem->image_url)
                                                    <img src="{{ $order->foodItem->image_url }}" alt="{{ $order->foodItem->name }}"
                                                         class="img-thumbnail me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                {{ $order->foodItem->name }}
                                            </td>
                                            <td>{{ number_format($order->price_at_order, 2) }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ number_format($order->price_at_order * $order->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="table-secondary">
                                        <th colspan="3" class="text-end">Grand Total:</th>
                                        <th>{{ number_format($booking->mealOrders->sum(function($order) {
                                            return $order->price_at_order * $order->quantity;
                                        }), 2) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No meals were pre-ordered with this booking.
                        </div>
                    @endif

                    @if(!$booking->booking_datetime->isPast() && ($booking->status == 'pending' || $booking->status == 'confirmed'))
                        <div class="mt-4">
                            <div class="d-flex justify-content-between">
                                @if($booking->booking_datetime->diffInHours(now()) > 1)
                                    <a href="{{ route('customer.bookings.edit', $booking->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit Booking
                                    </a>
                                @else
                                    <span class="text-muted">
                                        <i class="fas fa-info-circle"></i> Bookings can only be edited more than 1 hour before the reservation time.
                                    </span>
                                @endif

                                <form method="POST" action="{{ route('customer.bookings.cancel', $booking->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to cancel this booking?')">
                                        <i class="fas fa-times"></i> Cancel Booking
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
