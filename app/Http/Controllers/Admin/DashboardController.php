<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;

use App\Models\Admin\Document_Demande;

class DashboardController extends Controller
{
    public function index(){
        $nbDocumentsEnCours=Document_Demande::where('etat',0)->where('type','!=','DS')->count();
        $nbStageEnCours=Document_Demande::where('etat',0)->where('type','=','DS')->count();
        $nbAdmins=Admin::where('role','admin')->count();
        return view('admin.dashboard',compact('nbAdmins','nbDocumentsEnCours','nbStageEnCours','nbAdmins'));
    }
 
}
