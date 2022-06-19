<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use  HasFactory, Notifiable , HasApiTokens;

    protected $fillable = [
        'admin_name',
        'email',
        'password' ,
        'img'

    ];
    protected $appends = ['user_type'];
    protected $hidden = [
        'remember_token',
        'password'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserTypeAttribute()
    {
        return 'admins';
    }
}
