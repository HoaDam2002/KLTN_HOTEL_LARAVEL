<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_realtime extends Model
{
    use HasFactory;

    protected $table = 'booking_realtime';
    protected $fillable = [
        'id_booking',
        'id_roomDetail',
        'id_room',
        'check_in',
        'check_out',
        'price',
        'id_user',
        'id_tour',
        'payment',
        'status',
        'payment_total'
    ];

    public function room_detail()
    {
        return $this->belongsTo(Roomdetail::class,'id_roomDetail');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class,'id_booking');
    }
}
