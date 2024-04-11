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
    ];
}
