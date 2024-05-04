<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceServiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_detail_service';
    protected $fillable = [
        'id_booking_realtime',
        'id_invoice_service',
        'id_service',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class,'id_service');
    }

    public function invoice()
    {
        return $this->belongsTo(InvoiceService::class,'id_invoice_service');
    }
}
