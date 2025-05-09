<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all restaurant IDs
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            // Common Ghanaian dishes with variations for each restaurant
            $this->seedMenuItems($restaurant->id);
        }
    }

    private function seedMenuItems($restaurantId)
    {
        $categories = ['Main Course', 'Appetizer', 'Dessert', 'Beverage', 'Traditional'];

        $foodItems = [
            // Main Courses
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Jollof Rice with Chicken',
                'description' => 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.',
                'price' => 45.00,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Waakye Special',
                'description' => 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.',
                'price' => 40.00,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Banku with Tilapia',
                'description' => 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.',
                'price' => 55.00,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],

            // Appetizers
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Kelewele',
                'description' => 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.',
                'price' => 20.00,
                'category' => 'Appetizer',
                'image_url' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Meat Pie',
                'description' => 'Flaky pastry filled with seasoned minced meat, onions, and spices.',
                'price' => 15.00,
                'category' => 'Appetizer',
                'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],

            // Traditional
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Fufu with Light Soup',
                'description' => 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.',
                'price' => 50.00,
                'category' => 'Traditional',
                'image_url' => 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Tuo Zaafi',
                'description' => 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.',
                'price' => 45.00,
                'category' => 'Traditional',
                'image_url' => 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],

            // Beverages
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Sobolo (Hibiscus Drink)',
                'description' => 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.',
                'price' => 12.00,
                'category' => 'Beverage',
                'image_url' => 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Palm Wine',
                'description' => 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.',
                'price' => 18.00,
                'category' => 'Beverage',
                'image_url' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],

            // Desserts
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Bofrot (Puff Puff)',
                'description' => 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.',
                'price' => 15.00,
                'category' => 'Dessert',
                'image_url' => 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'restaurant_id' => $restaurantId,
                'name' => 'Tropical Fruit Platter',
                'description' => 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.',
                'price' => 25.00,
                'category' => 'Dessert',
                'image_url' => 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
        ];

        foreach ($foodItems as $item) {
            FoodItem::create($item);
        }
    }
}
