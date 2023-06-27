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
    //zdt il attribut he4i bch ki n'updati il profili maya3tinich hal erreure "Column not found: 1054 Unknown column 'updated_at' in 'field list'"
    public $timestamps = false;

}
