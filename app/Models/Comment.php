<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $fillable = [
        'comment',
        'rate',
        'id_user',
        'id_room'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    // Quan hệ với bảng Account
    public function typeRoom()
    {
        return $this->belongsTo(RoomModel::class,'id_room');
    }
}
