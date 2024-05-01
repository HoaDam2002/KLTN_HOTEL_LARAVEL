<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomdetail extends Model
{
    use HasFactory;

    protected $table = 'room_detail';
    protected $fillable = [
        'type_name',
        'id_room',
        'status'
    ];

    public function typeRoom(){
        return $this->belongsto('App\Models\RoomModel','id_room');
    }

    public function booking_realtime(){
        return $this->hasMany('App\Models\Booking_realtime','id_roomDetail');
    }
}
