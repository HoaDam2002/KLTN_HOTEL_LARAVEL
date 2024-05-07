<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceService extends Model
{
    use HasFactory;

    protected $table = 'invoice_service';

    protected $fillable = [
        'id_user',
    ];

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceServiceDetail::class,'id_invoice_service');
    }

}
