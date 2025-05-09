<?php

// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'booking_datetime',
        'guests_count',
        'status',
        'special_requests',
    ];

    protected $casts = [
        'booking_datetime' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function mealOrders()
    {
        return $this->hasMany(MealOrder::class);
    }

    // Calculate reminder time (30 minutes before booking)
    public function getReminderTimeAttribute()
    {
        return $this->booking_datetime->subMinutes(30);
    }
}
