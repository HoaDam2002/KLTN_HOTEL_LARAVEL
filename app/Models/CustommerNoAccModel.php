<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustommerNoAccModel extends Model
{
    use HasFactory;

    protected $table = 'customer_no_acc';
    protected $fillable = [
        'count_booking',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
