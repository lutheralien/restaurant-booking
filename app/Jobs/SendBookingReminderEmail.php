<?php

// app/Jobs/SendBookingReminderEmail.php

namespace App\Jobs;

use App\Mail\BookingReminder;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBookingReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function handle()
    {
        // Only send reminder if booking is still active
        if ($this->booking->status === 'pending' || $this->booking->status === 'confirmed') {
            Mail::to($this->booking->user->email)
                ->send(new BookingReminder($this->booking));
        }
    }
}
