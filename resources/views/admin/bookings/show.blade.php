@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Booking #{{ $booking->id }}</h4>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Bookings
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Customer Information</h5>
                            <p><strong>Name:</strong> {{ $booking->user->name }}</p>
                            <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                            <p><strong>Phone:</strong> {{ $booking->user->phone_number ?? 'Not provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Restaurant Information</h5>
                            <p><strong>Name:</strong> {{ $booking->restaurant->name }}</p>
                            <p><strong>Location:</strong> {{ $booking->restaurant->location }}</p>
                            <p><strong>Contact:</strong> {{ $booking->restaurant->contact_info }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Booking Details</h5>
                            <p><strong>Date & Time:</strong> {{ $booking->booking_datetime->format('F j, Y g:i A') }}</p>
                            <p><strong>Number of Guests:</strong> {{ $booking->guests_count }}</p>
                            <p><strong>Special Requests:</strong> {{ $booking->special_requests ?? 'None' }}</p>
                            <p><strong>Created At:</strong> {{ $booking->created_at->format('F j, Y g:i A') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Booking Status</h5>
                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="input-group mb-3">
                                    <select name="status" class="form-select">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button class="btn btn-primary" type="submit">Update Status</button>
                                </div>
                            </form>
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
                                            <td>{{ $order->foodItem->name }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
