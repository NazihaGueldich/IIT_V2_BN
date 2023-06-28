<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Document_Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Events\sendFirebaseNotificationEvent;
use App\Models\Etudiant;
use App\Models\Historique_Notification;

class DemandeStageController extends Controller
{
    public function index()
    {
        $documents=Document_Demande::with('student')
        ->where('type','=','DS')
        ->orderBy("date", "desc")
        ->paginate(8);


        return view('admin.stages.index',compact('documents'));
    }

    public function index2()
    {
        $documents=Document_Demande::with('student')
        ->where('type','=','DS')
        ->orderBy("date", "desc")
        ->paginate(8);


        return view('admin.stages.index',compact('documents'));
    }

    public function show($id)
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

        $doc = DB::table('document_demande')->find($id);
        $documents = DB::table('document_demande')
            ->join('etudiant', 'document_demande.code_etudiant', '=', 'etudiant.code_etudiant')
            ->select('document_demande.*', 'etudiant.nom', 'etudiant.prenom', 'etudiant.numero_identite')
            ->where('type', 'DS')
            ->where('document_demande.id', '=', $doc->id)
            ->get();

        return view('admins.stages.pdf', compact('documents'));
    }

    public function edit($id)
    {
        $document=Document_Demande::with('student')
        ->where('id','=',$id)
        ->get();

        return view('admin.stages.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = Document_demande::find($id);

        $document->etat = $request->get('etat');


        $document->save();

        //Send notif
        $student = $document->code_etudiant;
        $notificationTitle = "Demande de stage";

        if ($request->get('etat') == 0) {
            $notificationBody = "Votre document est en cours de traitement";
        } elseif ($request->get('etat') == 1) {
            $notificationBody = "Votre document est prêt";
        } else {
            $notificationBody = "Votre demande a été refusée";
        }
       event(new sendFirebaseNotificationEvent($student, $notificationTitle, 'Document', $notificationBody, ""));

        Historique_Notification::create([
            'receiver' => $student,
            'text' => $notificationBody,
            'title' => $notificationTitle,
            'type' => 'Document',
        ]);

        return redirect()->route('stages.index');
    }


}
