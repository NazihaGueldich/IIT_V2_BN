<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    public $table= "specialite";
    protected $primaryKey = 'id';

    public $timestamps = false;
    public function student(){
        return $this->hasMany(Etudiant::class);
     }

     public function level(){
        return $this->hasMany(Level::class);
     }
}
