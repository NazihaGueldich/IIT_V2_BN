<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    public $table= "niveau";
    protected $primaryKey = 'id';

    public $timestamps = false;
    public function student(){
        return $this->belongsTo(Etudiant::class);
     }
     public function speciality(){
        return $this->belongsTo(Speciality::class);
     }
}
