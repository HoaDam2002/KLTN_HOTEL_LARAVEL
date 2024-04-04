<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = "account";
    
    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Ghi đè phương thức markEmailAsVerified để cập nhật trạng thái xác minh email
    public function markEmailAsVerified()
    {
        $this->email_verified_at = now(); // Cập nhật trạng thái xác minh email
        $this->save(); // Lưu thay đổi vào cơ sở dữ liệu
    }
}
