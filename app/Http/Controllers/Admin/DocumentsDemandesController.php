<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Document_Demande;
use App\Events\sendFirebaseNotificationEvent;
use App\Models\Historique_Notification;
use App\Models\Etudiant;
use League\CommonMark\Node\Block\Document;

class DocumentsDemandesController extends Controller
{
    public function index()
    {
        $documents=Document_Demande::with('student')
        ->where('type','!=','DS')
        ->paginate(8);

       return view('admin.documents.index',compact('documents')); 
    }

    //afficher les document en cours
    public function index2()
    {
        $documents=Document_Demande::with('student')
        ->where('type','!=','DS')
        ->where('etat',0)
        ->paginate(8);

       return view('admin.documents.index',compact('documents')); 
    }

    public function edit( $doc)
    {
        
        $document=Document_Demande::with('student')
        ->where('id','=',$doc)
        ->get();

       
        return view('admin.documents.edit',compact('document'));
        }

  
    public function documentTypeSwitch($type){
        $fullType = "";
        switch( $type ){
        case "PAI":
            $fullType = "Attestations de paiement";
            break;
        case "AI":
            $fullType = "Attestations d'inscription";
            break;
        case "AP":
            $fullType = "Attestations de presence";
            break;
        case "AR":
            $fullType = "Attestations de réussite";
            break;
        case "RN":
            $fullType = "Relevés de notes";
            break;
        default:
            $fullType = "inconnu";
        }
        return $fullType;
    }
    
    //update etat of document
    public function update(Request $request, $id)
    {
        $document = Document_Demande::find($id);
        $document->etat = $request->get('etat');
        $document->save();

        return redirect()->route('documents.index');
    }

  
}
