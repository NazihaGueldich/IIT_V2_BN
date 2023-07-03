<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Arr;

use Illuminate\Http\Request;
use App\Models\Admin\Historique_Notification;
use App\Models\Admin\Document_Demande;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Events\sendFirebaseNotificationEvent;

class AffectationStageController extends Controller
{
    public function index()
    {
        $documents=Document_Demande::with('student')
        ->where('type','=','DS')
        ->orderBy("date", "desc")
        ->paginate(8);

        return view("admin.affectation_stage.index", compact('documents'));
    }

    public function edit($document)
    {
        $document = DB::table('document_demande')
            ->where('document_demande.id', '=', $document)
            ->join('etudiant', 'document_demande.code_etudiant', '=', 'etudiant.code_etudiant')
            ->select('document_demande.*', 'etudiant.nom', 'etudiant.prenom', 'etudiant.nationalite', 'etudiant.email', 'etudiant.tel_mobile')
            ->get();

        return view('admin.affectation_stage.edit', compact('document'));
    }

    public function update(Request $request, $document)
    {
        $document = Document_Demande::find($document);
        $document->etat = $request->get('etat');
        $document->save();

        //Send notif
        $student = $document->code_etudiant;
        $notificationTitle = "Affectation de stage";

        if ($request->get('etat') == 0) {
            $notificationBody = "Votre document est en cours de traitement";
        } elseif ($request->get('etat') == 1) {
            $notificationBody = "Votre document est prêt";
        } else {
            $notificationBody = "Votre demande a été refusée";
        }

        // $sender=auth()->guard('admin')->user()->email ;
        event(new sendFirebaseNotificationEvent($student, $notificationTitle, 'Document', $notificationBody,"", ""));

        Historique_Notification::create([
            'receiver' => $student,
            // 'sender' =>   $sender ,
            'text' => $notificationBody,
            'title' => $notificationTitle,
            'type' => 'Document',
        ]);

        return redirect()->route('affectStage.index');
    }


    public function show($doc)
    {
        $date = date("Y/m/d");
        $firstYear = "";
        $secondYear = "";
        $year = date("Y");
        if (date("m") < 9) {
            $firstYear = $year - 1;
            $secondYear = $year;
        } else {
            $firstYear = $year;
            $secondYear = $year + 1;
        };

        $doc = DB::table('document_demande')->find($doc);
        $documents = DB::table('document_demande')
            ->join('etudiant', 'document_demande.code_etudiant', '=', 'etudiant.code_etudiant')
            ->select('document_demande.*', 'etudiant.nom', 'etudiant.prenom', 'etudiant.numero_identite')
            ->where('type', 'DS')
            ->where('document_demande.id', '=', $doc->id)
            ->get();

        return view('admin.affectation_stage.pdf', compact('documents', 'firstYear', 'secondYear', 'date'));
    }
}
