<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Restaurants</h5>
                                    <h2 class="card-text">{{ $totalRestaurants }}</h2>
                                    <a href="{{ route('admin.restaurants.index') }}" class="text-white">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Customers</h5>
                                    <h2 class="card-text">{{ $totalCustomers }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Bookings</h5>
                                    <h2 class="card-text">{{ $totalBookings }}</h2>
                                    <a href="{{ route('admin.bookings.index') }}" class="text-white">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>Recent Bookings</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Restaurant</th>
                                <th>Date & Time</th>
                                <th>Guests</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->restaurant->name }}</td>
                                <td>{{ $booking->booking_datetime->format('M d, Y h:i A') }}</td>
                                <td>{{ $booking->guests_count }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : ($booking->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
