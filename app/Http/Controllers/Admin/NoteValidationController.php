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

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteValidationController extends Controller
{
    public function index(Request $request)
    {
        $levels = Level::all();
        $specialities = Speciality::all();
        $modules = Module::all();
        $typeEvaluation = TypeEvaluation::all();

        return view("admin.note_validation.index", compact("levels", "specialities", "modules", "typeEvaluation"));
    }

    public function filter(Request $request)
    {
        if ($request->filled('year') && $request->filled('specialty') && $request->filled('module')
            && $request->filled('niveau') && $request->filled('semester') && $request->filled('groupe') && $request->filled('type')) {

            $students = Cursus_Etudiant::with("student")->where([
                ['annee', $request->year],
                ["id_specialite", $request->specialty],
                ["id_niveau", $request->niveau]
            ])->get();

            $studentsIds = $students->pluck('code_etudiant')->toArray();
            $grades = Grade::whereIn("id_etuditan", $studentsIds)->where("id_module", $request->module)->where("type", $request->type)->get();

            foreach ($students as $student) {
                $studentGrade = $grades->where("id_etuditan", $student->code_etudiant)->first();
                $student["note"] = $studentGrade != null ? $studentGrade : null;
            }

            $speciality = Speciality::where('id', $request->specialty)->first();
            $module = Module::where('id', $request->module)->first();

            return view('admins.note_validation.notes', compact("students", "speciality", "module"));
        }
        return redirect()->route("admins.validationNote");
    }

    public function validateNote(Request $request)
    {
        if ($request->filled('grade')) {
            $grade = Grade::find($request->grade);

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
                "observation"=>"",
                "valide"=>0,
                "texte_autre_note"=>"",
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
