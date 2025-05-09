<?php

// app/Models/FoodItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'price',
        'category',
        'image_url',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function mealOrders()
    {
        return $this->hasMany(MealOrder::class);
    }
}
