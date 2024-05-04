<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';
    protected $fillable = [
        'name',
        'image',
        'price',
        'status'
    ];

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceFoodDetail::class,'id_food');
    }

}
