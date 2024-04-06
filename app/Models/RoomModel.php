<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'price',
        'person',
        'room_type_id',
        'description',
        'images',
        'beds',
        'quantity'
    ];

    public function typeRoom(){
        return $this->belongsto('App\Models\TypeRoomModel','room_type_id');
    }
}
