<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRealtiemNoAcc extends Model
{
    use HasFactory;
    protected $table = 'deposit_customer_counter';
    protected $fillable = [
        'id_booking_realtime',
        'deposit',
    ];

    public function booking_realtime()
    {
        return $this->belongsTo(Booking_realtime::class,'id_booking_realtime');
    }
}
