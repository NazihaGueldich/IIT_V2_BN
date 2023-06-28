<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiant';
    protected $primaryKey = 'code_etudiant';
    public $timestamps = false;

    protected $fillable = ['code_etudiant', 'nom','prenom'];

    public function documents(){
       return $this->hasMany(Document_Demande::class);
    }
    public function speciality(){
        return $this->belongsTo(Speciality::class);
     }
     public function level(){
        return $this->belongsTo(Level::class);
     }
     public function certifications(){
      return $this->hasMany(Certification::class,'code_etudiant');
   }

   public function awards(){
      return $this->hasMany(Awards::class,'code_etudiant');
   }
 
   public function internships(){
      return $this->hasMany(International_Internship::class,'code_etudiant');
   }
   public function mobilities(){
      return $this->hasMany(Mobility_Period::class,'code_etudiant');
   }
   public function organisations(){
      return $this->hasMany(Organisation_Of_Conferences::class,'code_etudiant');
   }

   public function informations(){
      return $this->hasMany(Other_Information::class,'code_etudiant');
   }
   public function participations(){
      return $this->hasMany(Participation_In_Clubs::class,'code_etudiant');
   } 
   public function voluntaries(){
      return $this->hasMany(Voluntary_Work::class,'code_etudiant');
   } 

}
