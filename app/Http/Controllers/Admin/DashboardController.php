<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use App\Models\Document_Demande;

class DashboardController extends Controller
{
    public function index(){
        
        return view('Admin.dashboard');
    }
 
}
