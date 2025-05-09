<?php
// app/Http/Controllers/Customer/BookingController.php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Jobs\SendBookingReminderEmail;
use App\Models\Booking;
use App\Models\FoodItem;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('customer');
    }

    public function create(Restaurant $restaurant)
    {
        $foodItems = $restaurant->foodItems()->get()->groupBy('category');
        return view('customer.bookings.create', compact('restaurant', 'foodItems'));
    }

    public function store(Request $request, Restaurant $restaurant)
    {
        // Log that the method was called
        \Log::info('BookingController store method called', [
            'restaurant_id' => $restaurant->id,
            'user_id' => Auth::id()
        ]);

        try {
            // Log the raw request data
            \Log::info('Booking request data', [
                'all_data' => $request->all()
            ]);

            $validatedData = $request->validate([
                'booking_date' => 'required|date|after:today',
                'booking_time' => 'required',
                'guests_count' => 'required|integer|min:1',
                'special_requests' => 'nullable|string',
                'food_items' => 'nullable|array',
                'food_items.*.id' => 'exists:food_items,id',
                'food_items.*.quantity' => 'integer|min:0', // Changed from min:1 to min:0
            ]);

            // Log successful validation
            \Log::info('Validation passed', [
                'validated_data' => $validatedData
            ]);

            // Combine date and time
            $bookingDatetime = Carbon::parse(
                $validatedData['booking_date'] . ' ' . $validatedData['booking_time']
            );

            // Log parsed datetime
            \Log::info('Parsed booking datetime', [
                'booking_datetime' => $bookingDatetime->toDateTimeString()
            ]);

            // Create booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'restaurant_id' => $restaurant->id,
                'booking_datetime' => $bookingDatetime,
                'guests_count' => $validatedData['guests_count'],
                'special_requests' => $validatedData['special_requests'] ?? null,
                'status' => 'pending',
            ]);

            // Log booking creation
            \Log::info('Booking created', [
                'booking_id' => $booking->id
            ]);

            // Add meal orders if selected
            if (isset($validatedData['food_items'])) {
                \Log::info('Processing food items', [
                    'food_items' => $validatedData['food_items']
                ]);

                foreach ($validatedData['food_items'] as $itemId => $item) {
                    // Log each food item being processed
                    \Log::info('Processing food item', [
                        'item_id' => $itemId,
                        'item_data' => $item
                    ]);

                    // Changed condition to check if quantity is greater than zero
                    if (isset($item['id']) && isset($item['quantity']) && (int)$item['quantity'] > 0) {
                        $foodItem = FoodItem::find($item['id']);

                        if ($foodItem) {
                            $mealOrder = $booking->mealOrders()->create([
                                'food_item_id' => $foodItem->id,
                                'quantity' => $item['quantity'],
                                'price_at_order' => $foodItem->price,
                            ]);

                            \Log::info('Meal order created', [
                                'meal_order_id' => $mealOrder->id,
                                'food_item' => $foodItem->name,
                                'quantity' => $item['quantity'],
                                'price' => $foodItem->price
                            ]);
                        } else {
                            \Log::warning('Food item not found', [
                                'item_id' => $item['id']
                            ]);
                        }
                    } else {
                        \Log::info('Skipping food item (quantity zero or missing data)', [
                            'item' => $item
                        ]);
                    }
                }
            } else {
                \Log::info('No food items in request');
            }

            // Queue email reminder (30 minutes before booking)
            try {
                $reminderTime = (clone $bookingDatetime)->subMinutes(30); // Using clone to prevent modifying original
                SendBookingReminderEmail::dispatch($booking)
                    ->delay($reminderTime);

                \Log::info('Email reminder scheduled', [
                    'reminder_time' => $reminderTime->toDateTimeString()
                ]);
            } catch (\Exception $e) {
                \Log::error('Failed to schedule reminder email', [
                    'error' => $e->getMessage()
                ]);
                // Continue without failing the whole process
            }

            \Log::info('Booking process completed successfully');

            return redirect()->route('customer.dashboard')
                ->with('success', 'Booking created successfully. You will receive an email reminder 30 minutes before your booking.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', [
                'errors' => $e->errors()
            ]);
            throw $e; // Re-throw to let Laravel handle the validation error
        } catch (\Exception $e) {
            \Log::error('Exception during booking creation', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'An error occurred while creating your booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);

        return view('customer.bookings.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        $this->authorize('update', $booking);

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('customer.dashboard')
            ->with('success', 'Booking cancelled successfully.');
    }
    public function edit(Booking $booking)
{
    // Authorize that this booking belongs to the current user
    $this->authorize('update', $booking);

    // Only allow editing if the booking is not in the past and not cancelled or completed
    if ($booking->booking_datetime->isPast() || in_array($booking->status, ['cancelled', 'completed'])) {
        return redirect()->route('customer.dashboard')
            ->with('error', 'You cannot edit this booking as it is in the past, has been cancelled, or has been completed.');
    }

    // Load the restaurant with its food items, grouped by category
    $booking->load('restaurant');
    $foodItems = $booking->restaurant->foodItems()->get()->groupBy('category');

    // Get current meal orders for pre-filling the form
    $currentOrders = $booking->mealOrders->keyBy('food_item_id');

    return view('customer.bookings.edit', compact('booking', 'foodItems', 'currentOrders'));
}
}
