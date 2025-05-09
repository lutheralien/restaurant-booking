<?php
// app/Http/Controllers/Customer/CustomerController.php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('customer');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $bookings = $user->bookings()
            ->with(['restaurant', 'mealOrders.foodItem'])
            ->latest()
            ->paginate(5);

        return view('customer.dashboard', compact('bookings'));
    }
}
