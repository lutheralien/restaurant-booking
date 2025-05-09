<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the restaurants.
     */
    public function index()
    {
        $restaurants = Restaurant::latest()->paginate(10);
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new restaurant.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created restaurant in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'cover_image' => 'nullable|url|max:255',
        ]);

        Restaurant::create($validatedData);

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully.');
    }

    /**
     * Display the specified restaurant.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified restaurant.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified restaurant in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'cover_image' => 'nullable|url|max:255',
        ]);

        $restaurant->update($validatedData);

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully.');
    }

    /**
     * Remove the specified restaurant from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant deleted successfully.');
    }
}
