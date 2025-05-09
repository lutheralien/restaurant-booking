<?php
// app/Models/Restaurant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'contact_info',
        'cover_image',
    ];

    public function foodItems()
    {
        return $this->hasMany(FoodItem::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
