<?php

// app/Http/Controllers/Customer/RestaurantController.php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::latest()->paginate(9);
        return view('customer.restaurants.index', compact('restaurants'));
    }

    public function show(Restaurant $restaurant)
    {
        $foodItems = $restaurant->foodItems()->get()->groupBy('category');
        return view('customer.restaurants.show', compact('restaurant', 'foodItems'));
    }
}
