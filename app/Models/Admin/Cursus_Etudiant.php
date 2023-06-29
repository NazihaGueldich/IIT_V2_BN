<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus_Etudiant extends Model
{
    use HasFactory;
    protected $table = 'cursus_etudiant';
    protected $primaryKey = 'code_etudiant';
    public $timestamps = false;
    public function student(){
        return $this->belongsTo(Etudiant::class,"code_etudiant","code_etudiant")->select("code_etudiant","nom","prenom");
    }
    public  function speciality(){
        return $this->belongsTo(Speciality::class,"id_specialite","id");
    }
}
