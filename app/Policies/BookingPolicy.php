<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the booking.
     */
    public function view(User $user, Booking $booking)
    {
        // A user can view their own bookings
        return $user->id === $booking->user_id;
    }

    /**
     * Determine whether the user can update the booking.
     */
    public function update(User $user, Booking $booking)
    {
        // A user can update their own bookings
        return $user->id === $booking->user_id;
    }
}
