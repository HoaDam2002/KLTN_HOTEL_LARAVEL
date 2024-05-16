<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_realtime extends Model
{
    use HasFactory;

    protected $table = 'booking_realtime';
    protected $fillable = [
        'id_booking',
        'id_roomDetail',
        'id_room',
        'check_in',
        'check_out',
        'price',
        'id_user',
        'id_tour',
        'payment',
        'status',
        'payment_total'
    ];

    public function room_detail()
    {
        return $this->belongsTo(Roomdetail::class,'id_roomDetail');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class,'id_booking');
    }

    public function invoice_detail_food()
    {
        return $this->hasMany(InvoiceFoodDetail::class,'id_booking_realtime');
    }

    public function invoice_detail_service()
    {
        return $this->hasMany(InvoiceServiceDetail::class,'id_booking_realtime');
    }

    public function deposit_customer()
    {
        return $this->hasOne(BookingRealtiemNoAcc::class, 'id_booking_realtime');
    }
}
