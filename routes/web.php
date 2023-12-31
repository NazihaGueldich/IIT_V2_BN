<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DocumentsDemandesController;
use App\Http\Controllers\Admin\DemandeStageController;
use App\Http\Controllers\Admin\AffectationStageController;
use App\Http\Controllers\Admin\NoteValidationController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

//page profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//page dashboard
Route::get('dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => 'auth:admin'], function () {


    });

    //gestion des demandes de documents
    Route::resource('documents',DocumentsDemandesController::class)->except(['show', 'create', 'store', 'destroy']);
    Route::get('documentEnCour', [DocumentsDemandesController::class, 'index2'])->name('documentEnCour');

    //gestion des demandes de stages
    Route::resource('stages',DemandeStageController::class)->except(['create', 'store', 'destroy']);
    Route::get('stagesEnCour', [DocumentsDemandesController::class, 'index2'])->name('stagesEnCour');

    //gestion des affections de stages
    Route::resource('affectStage',AffectationStageController::class)->except(['create', 'store', 'destroy']);

// Validation Note
Route::controller(NoteValidationController::class)->group(function(){
    Route::get('validation_note',"index")->name('validationNote');
    Route::get('validation_note/part2',"getGroupeModules")->name('validationNote.part2');   
    Route::get('validation_note/part3',"getModules")->name('validationNote.part3');   

   Route::get('validation_note/filter',"filter")->name('validationNote.filter');
   Route::get('validation_note/unlock',"unlock")->name('validationNote.unlock');
   Route::get('validation_note/validate',"validateNote")->name('validationNote.validate');
});



 //gestion admins
 Route::resource('admins', 'AdminAuthController', [
    'except' => ['show']
]); 

Route::resource("admins",AdminAuthController::class)->middleware(['auth']); 

        Route::get('activate', 'AdminController@activate')->name('active');
        Route::get('activateEnseignant', 'AdminController@activate_ensegnant')->name('activate_ensegnant');

        Route::get('editpassword/{admin}', 'AdminControllerFe@showform')->name('edit.show');
        Route::post('editpassword/{admin}', 'AdminController@editPassword')->name('edit.store');


require __DIR__.'/auth.php';
