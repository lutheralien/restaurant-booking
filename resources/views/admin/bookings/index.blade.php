@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">All Bookings</h4>
                    <div>
                        <form action="{{ route('admin.bookings.index') }}" method="GET" class="d-inline-flex">
                            <select name="status" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Restaurant</th>
                                    <th>Date & Time</th>
                                    <th>Guests</th>
                                    <th>Status</th>
                                    <th>Pre-ordered Meals</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->restaurant->name }}</td>
                                        <td>{{ $booking->booking_datetime->format('M d, Y g:i A') }}</td>
                                        <td>{{ $booking->guests_count }}</td>
                                        <td>
                                            <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : ($booking->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $booking->mealOrders->count() }}</td>
                                        <td>
                                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No bookings found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $bookings->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
