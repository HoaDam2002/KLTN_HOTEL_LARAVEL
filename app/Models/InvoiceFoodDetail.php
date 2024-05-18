<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceFoodDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_detail_food';
    protected $fillable = [
        'id_booking_realtime',
        'id_invoice_food',
        'id_food',
        'quantity',
        'price',
        'name_food'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class,'id_food');
    }

    public function invoice()
    {
        return $this->belongsTo(InvoiceFood::class,'id_invoice_food');
    }

    public function booking_realtime()
    {
        return $this->belongsTo(Booking_realtime::class,'id_booking_realtime');
    }
}
