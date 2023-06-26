<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_Demande extends Model
{
    use HasFactory;
    protected $table = 'document_demande';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [ 'code_etudiant','year','type','urgent','justification','etat','date','schoolyear','speciality'];

    public function student(){
        return $this->belongsTo(Etudiant::class,'code_etudiant','code_etudiant');
    }
}
