<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Admin extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="admins";
    protected $fillable = [
        'email',
        'password',
    ];
/* 
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ]; */

}
