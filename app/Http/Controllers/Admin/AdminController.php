<?php

// app/Http/Controllers/Admin/AdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $totalRestaurants = Restaurant::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalBookings = Booking::count();
        $recentBookings = Booking::with(['user', 'restaurant'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRestaurants',
            'totalCustomers',
            'totalBookings',
            'recentBookings'
        ));
    }
}
