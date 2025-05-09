<?php
// app/Models/MealOrder.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'food_item_id',
        'quantity',
        'price_at_order',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }

    // Calculate total price for this order item
    public function getTotalPriceAttribute()
    {
        return $this->price_at_order * $this->quantity;
    }
}
