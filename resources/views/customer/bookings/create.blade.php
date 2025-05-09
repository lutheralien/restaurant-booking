<!-- resources/views/customer/bookings/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Book a Table at {{ $restaurant->name }}</h4>
                </div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('customer.bookings.store', $restaurant->id) }}" id="bookingForm">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="booking_date" class="form-label">Booking Date</label>
                                    <input type="date" class="form-control @error('booking_date') is-invalid @enderror"
                                           id="booking_date" name="booking_date"
                                           value="{{ old('booking_date', date('Y-m-d', strtotime('+1 day'))) }}" required>
                                    @error('booking_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">Please select a future date.</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="booking_time" class="form-label">Booking Time</label>
                                    <input type="time" class="form-control @error('booking_time') is-invalid @enderror"
                                           id="booking_time" name="booking_time"
                                           value="{{ old('booking_time', '18:00') }}" required>
                                    @error('booking_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">Restaurant hours: 10:00 AM - 10:00 PM</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="guests_count" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control @error('guests_count') is-invalid @enderror"
                                   id="guests_count" name="guests_count"
                                   value="{{ old('guests_count', 2) }}" min="1" max="20" required>
                            @error('guests_count')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">For parties larger than 20 people, please contact the restaurant directly.</small>
                        </div>

                        <div class="form-group mb-4">
                            <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                            <textarea class="form-control @error('special_requests') is-invalid @enderror"
                                      id="special_requests" name="special_requests" rows="3"
                                      placeholder="Any special arrangements, dietary requirements, or preferences">{{ old('special_requests') }}</textarea>
                            @error('special_requests')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="alert alert-info mb-4">
                            <i class="fas fa-info-circle me-2"></i> You'll receive an email confirmation after booking, and a reminder 30 minutes before your reservation.
                        </div>

                        <h4 class="mt-4 mb-3">Pre-order Meals (Optional)</h4>
                        <p class="text-muted mb-3">Add meals to your booking to have them ready when you arrive.</p>

                        <div class="accordion mb-4" id="foodItemsAccordion">
                            @foreach($foodItems as $category => $items)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ Str::slug($category) }}">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ Str::slug($category) }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                aria-controls="collapse{{ Str::slug($category) }}">
                                            {{ $category }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ Str::slug($category) }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                         aria-labelledby="heading{{ Str::slug($category) }}" data-bs-parent="#foodItemsAccordion">
                                        <div class="accordion-body">
                                            <div class="row">
                                                @foreach($items as $item)
                                                    <div class="col-md-6 mb-3">
                                                        <div class="card h-100 menu-item-card">
                                                            @if($item->image_url)
                                                                <img src="{{ $item->image_url }}" class="card-img-top menu-item-image" alt="{{ $item->name }}">
                                                            @else
                                                                <div class="card-img-top menu-item-placeholder d-flex align-items-center justify-content-center bg-light">
                                                                    <i class="fas fa-utensils fa-3x text-muted"></i>
                                                                </div>
                                                            @endif
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                                <p class="card-text text-muted">{{ $item->description }}</p>
                                                                <p class="card-text"><strong>GHS {{ number_format($item->price, 2) }}</strong></p>

                                                                <div class="input-group">
                                                                    <button type="button" class="btn btn-outline-secondary decrease-quantity">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <input type="number" class="form-control text-center food-quantity"
                                                                           name="food_items[{{ $item->id }}][quantity]"
                                                                           value="{{ old('food_items.' . $item->id . '.quantity', 0) }}"
                                                                           min="0" max="10" step="1" data-price="{{ $item->price }}">
                                                                    <button type="button" class="btn btn-outline-secondary increase-quantity">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <input type="hidden" name="food_items[{{ $item->id }}][id]" value="{{ $item->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="card mb-4" id="orderSummary">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                <div id="selectedItems">
                                    <p class="text-center text-muted" id="emptyOrderMessage">No items selected yet</p>
                                    <div id="itemList" class="d-none">
                                        <!-- Selected items will be displayed here via JavaScript -->
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <h5>Total:</h5>
                                    <h5 id="orderTotal">GHS 0.00</h5>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-between">
                            <a href="{{ route('customer.restaurants.show', $restaurant->id) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-1"></i> Complete Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity increase/decrease buttons
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input.food-quantity');
                const currentValue = parseInt(input.value || 0);
                if (currentValue < parseInt(input.max)) {
                    input.value = currentValue + 1;
                    updateOrderSummary(); // Call directly instead of relying on event bubbling
                }
            });
        });

        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input.food-quantity');
                const currentValue = parseInt(input.value || 0);
                if (currentValue > parseInt(input.min)) {
                    input.value = currentValue - 1;
                    updateOrderSummary(); // Call directly instead of relying on event bubbling
                }
            });
        });

        // Update order summary when quantities change directly
        document.querySelectorAll('.food-quantity').forEach(input => {
            input.addEventListener('input', updateOrderSummary);
            input.addEventListener('change', updateOrderSummary);
        });

        function updateOrderSummary() {
            const itemList = document.getElementById('itemList');
            const emptyMessage = document.getElementById('emptyOrderMessage');
            const orderTotal = document.getElementById('orderTotal');

            let total = 0;
            let itemCount = 0;
            let itemsHtml = '';

            document.querySelectorAll('.food-quantity').forEach(input => {
                const quantity = parseInt(input.value || 0);
                if (quantity > 0) {
                    itemCount++;
                    // Force conversion to number with parseFloat and ensure we have a valid number
                    const price = parseFloat(input.getAttribute('data-price')) || 0;
                    const itemTotal = quantity * price;
                    total += itemTotal;

                    const itemName = input.closest('.menu-item-card').querySelector('.card-title').textContent;

                    itemsHtml += `
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <span class="fw-bold">${quantity}x</span> ${itemName}
                            </div>
                            <div>GHS ${itemTotal.toFixed(2)}</div>
                        </div>
                    `;
                }
            });

            if (itemCount > 0) {
                itemList.innerHTML = itemsHtml;
                itemList.classList.remove('d-none');
                emptyMessage.classList.add('d-none');
            } else {
                itemList.classList.add('d-none');
                emptyMessage.classList.remove('d-none');
            }

            orderTotal.textContent = `GHS ${total.toFixed(2)}`;
        }

        // Initialize the order summary
        updateOrderSummary();

        // Form validation before submission
        const bookingForm = document.getElementById('bookingForm');
        bookingForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default submission to control the flow

            const bookingDate = document.getElementById('booking_date').value;
            const selectedDate = new Date(bookingDate);
            const today = new Date();

            // Clear hours, minutes, seconds for date comparison
            today.setHours(0, 0, 0, 0);

            if (selectedDate <= today) {
                alert('Please select a future date for your booking.');
                return;
            }

            // If validation passes, manually submit the form
            this.submit();
        });
    });
</script>
@endpush

<style>
    .menu-item-image {
        height: 180px;
        object-fit: cover;
    }

    .menu-item-placeholder {
        height: 180px;
    }

    .food-quantity {
        width: 60px;
    }
</style>
@endsection
