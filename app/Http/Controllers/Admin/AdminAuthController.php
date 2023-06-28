<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Mail\AcitveCompte;
use App\Mail\AcitveCompteEnseignant;
use Illuminate\Support\Facades\Mail;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class AdminAuthController extends Controller
{

    public function index()
    {
        $admins= Admin::paginate(5);
        return view('admin.admins.index',compact('admins'));
    }

    //pour activer un compte etudient
    public function activate(Request $request){
        $data = DB::select('SELECT  connection_etudiant.email as office,etudiant.email,etudiant.password_office365
        from connection_etudiant,etudiant where etudiant.code_etudiant=connection_etudiant.code_etudiant and isActive =0');
        foreach($data as $value){
            DB::table('connection_etudiant')->where('email',$value->office)->update(['mot_pass'=>$value->password_office365,'isActive'=>1]);

            Mail::to($value->email)->send(new AcitveCompte($value->office,$value->password_office365));

        }

        return redirect()->route('admins.index');
    }

    //pour activer un compte ensegnant
    public function activate_ensegnant(Request $request){
        $data = DB::select('SELECT  connection_enseignant.email as office,enseignant.email,enseignant.pswd
        from connection_enseignant,enseignant where enseignant.id=connection_enseignant.id_enseignant and isActive =0');
        foreach($data as $value){
            DB::table('connection_enseignant')->where('email',$value->office)->update(['password'=>Hash::make($value->pswd),'isActive'=>1]);

            Mail::to($value->email)->send(new AcitveCompteEnseignant($value->office,$value->pswd));

        }

        return redirect()->route('admins.index');
    }

    
    //creation d'un nouveau admin
    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {    $this->validate($request, [
        'adminEmail'  => 'required|Email',
        'adminPassword'  => 'required'
        ]);

        $admin = new Admin;
        $admin->password = Hash::make($request->input('adminPassword'));
        $admin->email = $request->input('adminEmail');
        $admin->save();

        return redirect()->route('admins.index');
    }

    //mofification d'un admin
    public function edit($admin)
    {
         $a = Admin::find($admin);
        return view('admin.admins.edit',  compact('a'));
    }

    public function update(Request $request, $admin)
    {
        $this->validate($request, [
            'adminEmail'  => 'required|email',
    ]);
    $admin = Admin::find($admin);
    $admin->email = $request->get('adminEmail');
    $admin->save();
    return redirect()->route('admins.index');
    }

    //suppression d'un admin
    public function destroy($admin)
    {

        $a = Admin::find($admin);
        $a->delete();

        return redirect()->route('admins.index');
    }

    //edit password
    public function showform($admin){
        $admin = Admin::find($admin);
        return view('admin.admins.editpassword',  compact('admin'));
    }

    public function editPassword(Request $request, $admin, MessageBag $message_bag){

        $request->validate([
            'currentPass' => ['required'],
            'newPassword' => ['required'],
            'confirmNewPassword' => ['same:newPassword'],
        ]);

        $a = Admin::find($admin);

        if (Hash::check($request->currentPass, $a->password))
            $a->update(['password'=> Hash::make($request->newPassword)]);
        else
            $message_bag->add('currentPass', 'invalid current password');

        //return to admin
        $a = Admin::find($admin);
        return view('admin.admins.edit',  compact('a'))->withErrors($message_bag);;
    }
}
