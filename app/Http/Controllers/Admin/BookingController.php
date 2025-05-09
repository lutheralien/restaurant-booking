<?php
// app/Http/Controllers/Admin/BookingController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of all bookings.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'restaurant', 'mealOrders']);

        // Filter by status if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'restaurant', 'mealOrders.foodItem']);

        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update the status of a booking.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->back()
            ->with('success', 'Booking status updated successfully.');
    }
}
