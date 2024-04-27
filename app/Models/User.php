<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "users";

    protected $fillable = [
        'name',
        'phone',
        'birth_date',
        'address',
        'nationality',
        'gender',
        'role',
    ];

    public function customer(){
        return $this->hasOne(Customer::class,'id_user');
    }

    public function customer_no_acc(){
        return $this->hasOne(CustommerNoAccModel::class,'id_user');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
