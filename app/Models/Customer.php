<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $fillable = [
        'avatar',
        'count_booking',
        'id_user',
        'id_account'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    // Quan hệ với bảng Account
    public function account()
    {
        return $this->belongsTo(Account::class,'id_account');
    }
}
