<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;
    protected $table = 'room_type';

    protected $fillable = [
        'name',
        'price',
        'person',
        'description',
        'images',
        'beds',
        'quantity'
    ];

    public function RoomDetail(){
        return $this->hasMany('App\Models\RoomDetail','id_room');
    }

    public function RoomDetail2(){
        return $this->hasMany('App\Models\RoomDetail','id_room');
    }


    public function comment(){
        return $this->hasMany(Comment::class,'id_room');
    }
}
