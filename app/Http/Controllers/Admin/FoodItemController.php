<?php

// app/Http/Controllers/Admin/FoodItemController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Restaurant $restaurant)
    {
        $foodItems = $restaurant->foodItems()->paginate(10);
        return view('admin.food-items.index', compact('restaurant', 'foodItems'));
    }

    public function create(Restaurant $restaurant)
    {
        $categories = ['Main Course', 'Appetizer', 'Dessert', 'Beverage', 'Traditional'];
        return view('admin.food-items.create', compact('restaurant', 'categories'));
    }

    public function store(Request $request, Restaurant $restaurant)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image_url' => 'nullable|url|max:255',
        ]);

        $restaurant->foodItems()->create($validatedData);

        return redirect()->route('admin.restaurants.food-items.index', $restaurant->id)
            ->with('success', 'Food item created successfully.');
    }

    public function edit(Restaurant $restaurant, FoodItem $foodItem)
    {
        $categories = ['Main Course', 'Appetizer', 'Dessert', 'Beverage', 'Traditional'];
        return view('admin.food-items.edit', compact('restaurant', 'foodItem', 'categories'));
    }

    public function update(Request $request, Restaurant $restaurant, FoodItem $foodItem)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image_url' => 'nullable|url|max:255',
        ]);

        $foodItem->update($validatedData);

        return redirect()->route('admin.restaurants.food-items.index', $restaurant->id)
            ->with('success', 'Food item updated successfully.');
    }

    public function destroy(Restaurant $restaurant, FoodItem $foodItem)
    {
        $foodItem->delete();

        return redirect()->route('admin.restaurants.food-items.index', $restaurant->id)
            ->with('success', 'Food item deleted successfully.');
    }
}
