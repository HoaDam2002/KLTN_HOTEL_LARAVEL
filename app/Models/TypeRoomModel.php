<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoomModel extends Model
{
    use HasFactory;

    protected $table = 'type_room';

    protected $fillable = [
        'type_name'
    ];
}
