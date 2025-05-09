<!-- resources/views/customer/dashboard.blade.php -->
@extends('layouts.app')
@include('partials.tawkto')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customer Dashboard</div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4>Your Bookings</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('customer.restaurants.index') }}" class="btn btn-primary">Browse Restaurants</a>
                        </div>
                    </div>

                    @if($bookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Restaurant</th>
                                        <th>Date & Time</th>
                                        <th>Guests</th>
                                        <th>Status</th>
                                        <th>Pre-ordered Meals</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->restaurant->name }}</td>
                                        <td>{{ $booking->booking_datetime->format('M d, Y h:i A') }}</td>
                                        <td>{{ $booking->guests_count }}</td>
                                        <td>
                                            <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : ($booking->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $booking->mealOrders->count() }} items</td>
                                        <td>
                                            <a href="{{ route('customer.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>

                                            @if($booking->status == 'pending' || $booking->status == 'confirmed')
                                                <form method="POST" action="{{ route('customer.bookings.cancel', $booking->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $bookings->links() }}
                    @else
                        <div class="alert alert-info">
                            You don't have any bookings yet.
                            <a href="{{ route('customer.restaurants.index') }}">Browse restaurants</a> to make a booking.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
