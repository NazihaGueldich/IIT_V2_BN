<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notation extends Model
{
    protected $table = "new_notation";
    public $timestamps = false;
    protected $fillable = [
        "id_etudiant",
        "id_module",
        "id_type_evaluation",
        "id_enseignant",
        "observation",
        "valide",
        "texte_autre_note",
        "semestre",
        "annee",
        "note",
        "date",
        "id_user",
        "type_user",
        "code_examen"
    ];
}
