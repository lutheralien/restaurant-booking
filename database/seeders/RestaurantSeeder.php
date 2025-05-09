<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'Accra Delight',
                'description' => 'Experience authentic Ghanaian cuisine in the heart of Accra. Our chefs prepare traditional dishes using fresh, locally-sourced ingredients. From perfectly spiced jollof rice to savory banku and tilapia, we offer a true taste of Ghana in a warm, welcoming atmosphere.',
                'location' => 'East Legon, Accra',
                'contact_info' => '+233 20 123 4567',
                'cover_image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Waakye Paradise',
                'description' => 'Dedicated to perfecting Ghana\'s beloved waakye dish, our restaurant serves this classic rice and beans delicacy with all the traditional accompaniments. Enjoy our signature shito sauce, perfectly fried plantains, and your choice of protein in a casual, family-friendly setting.',
                'location' => 'Osu, Accra',
                'contact_info' => '+233 24 987 6543',
                'cover_image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Coastal Flavors',
                'description' => 'Specializing in fresh seafood and coastal Ghanaian dishes, we bring the taste of Ghana\'s shoreline to your plate. Our grilled tilapia, seafood okro stew, and palm nut soup are customer favorites. Enjoy ocean views and the catch of the day in our beachside setting.',
                'location' => 'Labadi Beach, Accra',
                'contact_info' => '+233 27 345 6789',
                'cover_image' => 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Fusion Kitchen',
                'description' => 'Where Ghanaian cuisine meets international flavors. Our innovative chefs blend traditional Ghanaian ingredients with techniques from around the world to create unique, delicious dishes that surprise and delight. Try our jollof risotto or shito-infused pasta for a truly unforgettable dining experience.',
                'location' => 'Airport Residential Area, Accra',
                'contact_info' => '+233 23 456 7890',
                'cover_image' => 'https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Palm Grove',
                'description' => 'A tranquil garden restaurant featuring palm wine and traditional Ghanaian delicacies. Our signature fufu and light soup, palmnut stew, and banku with pepper sauce highlight the rich culinary heritage of Ghana. Dine under the shade of palm trees in our outdoor garden setting.',
                'location' => 'Cantonments, Accra',
                'contact_info' => '+233 26 789 0123',
                'cover_image' => 'https://images.unsplash.com/photo-1519690889869-e705e59f72e1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Savanna Grill',
                'description' => 'Inspired by Northern Ghanaian cuisine, we specialize in grilled meats, guinea fowl, and fragrant rice dishes. Our tuo zaafi and lamb kebabs showcase the bold flavors and spices of Ghana\'s northern regions. Enjoy our rustic décor and live traditional music on weekends.',
                'location' => 'Dzorwulu, Accra',
                'contact_info' => '+233 25 678 9012',
                'cover_image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Heritage House',
                'description' => 'Located in a restored colonial building, Heritage House celebrates Ghana\'s diverse culinary traditions. Each of our dining rooms represents a different region of Ghana, offering an educational and delicious tour of the country\'s food culture. Our menu rotates weekly to showcase regional specialties.',
                'location' => 'Labone, Accra',
                'contact_info' => '+233 22 345 6789',
                'cover_image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
            [
                'name' => 'Modern Ghana',
                'description' => 'A contemporary take on Ghanaian cuisine, highlighting fresh, healthy ingredients and innovative cooking techniques. Our menu features lighter versions of traditional favorites alongside creative new dishes that reflect Ghana\'s evolving food scene. Sleek, modern decor and attentive service complete the experience.',
                'location' => 'Ridge, Accra',
                'contact_info' => '+233 29 876 5432',
                'cover_image' => 'https://images.unsplash.com/photo-1498654896293-37aacf113fd9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
