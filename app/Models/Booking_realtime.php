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
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
