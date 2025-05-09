<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\FoodItemController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\RestaurantController as CustomerRestaurantController;
use App\Http\Controllers\Customer\BookingController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Restaurant management
    Route::resource('restaurants', AdminRestaurantController::class);

    // Food items management
    Route::resource('restaurants.food-items', FoodItemController::class);

    // Bookings management
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');
});

// Customer routes
Route::prefix('customer')->name('customer.')->middleware(['auth', 'customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');

    // Restaurant browsing
    Route::get('/restaurants', [CustomerRestaurantController::class, 'index'])->name('restaurants.index');
    Route::get('/restaurants/{restaurant}', [CustomerRestaurantController::class, 'show'])->name('restaurants.show');

    // Booking
    Route::get('/restaurants/{restaurant}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/restaurants/{restaurant}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit'); // Add this route
    Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update'); // Add this route
    Route::patch('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});
// Redirect authenticated users based on their role
Route::get('/home', function () {
    if (Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('customer.dashboard');
    }
})->name('home')->middleware('auth');
