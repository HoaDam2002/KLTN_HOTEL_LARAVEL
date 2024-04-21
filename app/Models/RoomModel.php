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
        'description',
        'images',
        'beds',
        'quantity'
    ];

    public function RoomDetail(){
        return $this->hasMany('App\Models\RoomDetail','id_room');
    }
}
