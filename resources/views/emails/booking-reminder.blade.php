// resources/views/emails/booking-reminder.blade.php

@component('mail::message')
# Booking Reminder

Hello {{ $booking->user->name }},

This is a reminder that your booking at **{{ $booking->restaurant->name }}** is coming up in 30 minutes.

**Booking Details:**
- Date and Time: {{ $booking->booking_datetime->format('F j, Y, g:i a') }}
- Number of Guests: {{ $booking->guests_count }}
- Location: {{ $booking->restaurant->location }}

@if($booking->mealOrders->count() > 0)
**Pre-ordered Meals:**
@component('mail::table')
| Meal | Quantity | Price |
|------|----------|-------|
@foreach($booking->mealOrders as $order)
| {{ $order->foodItem->name }} | {{ $order->quantity }} | GHS {{ number_format($order->price_at_order, 2) }} |
@endforeach
| **Total** | | **GHS {{ number_format($booking->mealOrders->sum('total_price'), 2) }}** |
@endcomponent
@endif

We look forward to serving you!

@component('mail::button', ['url' => route('customer.bookings.show', $booking->id)])
View Booking Details
@endcomponent

Thank you for choosing our platform.

Regards,<br>
{{ config('app.name') }}
@endcomponent
