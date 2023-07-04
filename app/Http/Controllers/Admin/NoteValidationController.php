<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Grade;
use App\Models\Admin\Level;
use App\Models\Admin\Module;
use App\Models\Admin\Notation;
use App\Models\Admin\Speciality;
use App\Models\Admin\TypeEvaluation;
use App\Models\Admin\Cursus_Etudiant;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteValidationController extends Controller
{

    //l'affichage 3alawel
    public function index(Request $request)
    {
        $levels = Level::all();
        $specialities = Speciality::all();
        $modules = Module::all();
        $typeEvaluation = TypeEvaluation::all();

        return view("admin.note_validation.index", compact("levels", "specialities", "modules", "typeEvaluation"));
    }

    //l'affichage ba3ed maya5tar il niveau wel specialité
    public function getGroupeModules(Request $request)
    {
        $niveau=$request->niveau;
        $specialty=$request->specialty;
        $groupeModules = DB::table('new_groupe_module')->select("id","id_specialite","groupe_module","niveau")
            ->where([
                ['niveau', '=', $niveau],
                ['id_specialite', '=', $specialty]
            ])
            ->get();
        return $groupeModules;
    }

    //l'affichage ba3ed maya5tar il semester wel module
    public function getModules(Request $request)
    {
        $groupeModules = $request->groupeModules;
        $semester = $request->semester;
        $niveau = $request->niveau;
        $specialty = $request->specialty;

        $modules = Module::select("id","id_groupe_module","module")
            ->where('id_groupe_module', $groupeModules)
            ->where('semestre', $semester)
            ->get();

        $typeEvaluation = TypeEvaluation::all();

        $array[0]=$modules;
        $array[1]=$typeEvaluation;

        return $array;
    }


    public function filter(Request $request)
    {
        if ($request->filled('year') && $request->filled('specialty') && $request->filled('module')
            && $request->filled('niveau') && $request->filled('semester') && $request->filled('groupe') && $request->filled('type')) {

            $students = Cursus_Etudiant::select("cursus_etudiant.*", "etudiant.nom", "etudiant.prenom", "etudiant.code_etudiant")
                ->join('etudiant', 'etudiant.code_etudiant', '=', 'cursus_etudiant.code_etudiant')
                ->where([
                    ['annee', $request->year],
                    ["cursus_etudiant.id_specialite", $request->specialty],
                    ["cursus_etudiant.id_niveau", $request->niveau]

                ])
                ->orderBy("etudiant.nom")
                ->get();

            $studentsIds = $students->pluck('code_etudiant')->toArray();
            $grades = Grade::whereIn("id_etuditan", $studentsIds)->where("id_module", $request->module)->where("type", $request->type)->get();

            foreach ($students as $student) {
                $studentGrade = $grades->where("id_etuditan", $student->code_etudiant)->first();
                $student["note"] = $studentGrade != null ? $studentGrade : null;
            } 
          

            $speciality = Speciality::where('id', $request->specialty)->first();
            $module = Module::where('id', $request->module)->first();


            $students=$students->sortBy("nom");
            
            $nb = 0;

            if ($students->isNotEmpty()) {
                $nb = $students->whereNotNull('note')->count();
            }

            return view('admin.note_validation.notes', compact("students", "speciality", "module","nb"));
        }
        return redirect()->route("admin.validationNote");
    }

    public function validateNote(Request $request)
    {
        foreach ($request->etd as $etd) {
                $grade = Grade::find($etd->note);
                Notation::create([
                    "id_etudiant" => $grade->id_etuditan,
                    "id_module" => $grade->id_module,
                    "id_type_evaluation" => $grade->type,
                    "id_enseignant" => $grade->id_enseignant,
                    "semestre" => $grade->semestre,
                    "annee" => $grade->annee,
                    "note" => $grade->note,
                    "date" => Carbon::now(),
                    "type_user" => "ADMINISTRATION",
                    "id_user" => 0,
                    "observation" => "",
                    "valide" => 0,
                    "texte_autre_note" => "",
                    "code_examen" => $grade->code
                ]);
        }
        return redirect()->back();
    }

    public function unlock(Request $request)
    {
        if ($request->filled('grade')) {
            Grade::where([["id", $request->grade]])->update(["locked" => 0]);
        }
        return redirect()->back();
    }
}
