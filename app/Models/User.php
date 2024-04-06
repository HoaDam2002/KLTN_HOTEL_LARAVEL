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
        'role',
    ];

    // public function account(){
    //     return $this->hasOne('App\Models\Customer','id_user');
    // }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
