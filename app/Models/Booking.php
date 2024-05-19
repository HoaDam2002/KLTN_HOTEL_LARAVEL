<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = [
        'id_user',
        'id_room',
        'status',
        'check_in',
        'check_out',
        'quantity',
        'guests',
        'deposits',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function room()
    {
        return $this->belongsTo(RoomModel::class,'id_room');
    }   

    public function booking_realtime()
    {
        return $this->hasMany(Booking_realtime::class,'id_booking');
    }  

    public function comment()
    {
        return $this->hasMany(Comment::class,'id_booking');
    }  

}
