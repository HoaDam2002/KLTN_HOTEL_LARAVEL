<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $fillable = [
        'name',
        'image',
        'price',
        'status'
    ];

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceServiceDetail::class,'id_service');
    }
}
