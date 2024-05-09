<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceFood extends Model
{
    use HasFactory;

    protected $table = 'invoice_food';

    protected $fillable = [
        'id_user',
    ];

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceFoodDetail::class,'id_invoice_food');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
