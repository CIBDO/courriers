<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\SignataireController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\ReceptionCourrierController;
use App\Http\Controllers\ImputationController;
use App\Http\Controllers\BordereauEnvoiController;
use App\Http\Controllers\DestinataireController;
use App\Http\Controllers\ExpeditaireController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //SERVICES
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
//PROFILS
Route::get('/profils', [ProfilController::class, 'index'])->name('profils.index');
Route::get('/profils/create', [ProfilController::class, 'create'])->name('profils.create');
Route::post('/profils', [ProfilController::class, 'store'])->name('profils.store');
Route::get('/profils/{profil}/edit', [ProfilController::class, 'edit'])->name('profils.edit');
Route::put('/profils/{profil}', [ProfilController::class, 'update'])->name('profils.update');
Route::delete('/profils/{profil}', [ProfilController::class, 'destroy'])->name('profils.destroy');
//PERSONNEL
Route::get('/personnels', [PersonnelController::class, 'index'])->name('personnels.index');
Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');
Route::post('/personnels', [PersonnelController::class, 'store'])->name('personnels.store');
Route::get('/personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit');
Route::put('/personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update');
Route::delete('/personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy');
//SIGNATAIRES
Route::get('/signataires', [SignataireController::class, 'index'])->name('signataires.index');
Route::get('/signataires/create', [SignataireController::class, 'create'])->name('signataires.create');
Route::post('/signataires', [SignataireController::class, 'store'])->name('signataires.store');
Route::get('/signataires/{signataire}/edit', [SignataireController::class, 'edit'])->name('signataires.edit');
Route::put('/signataires/{signataire}', [SignataireController::class, 'update'])->name('signataires.update');
Route::delete('/signataires/{signataire}', [SignataireController::class, 'destroy'])->name('signataires.destroy');
//DISPOSITIONS
Route::get('/dispositions', [DispositionController::class, 'index'])->name('dispositions.index');
Route::get('/dispositions/create', [DispositionController::class, 'create'])->name('dispositions.create');
Route::post('/dispositions', [DispositionController::class, 'store'])->name('dispositions.store');
Route::get('/dispositions/{disposition}/edit', [DispositionController::class, 'edit'])->name('dispositions.edit');
Route::put('/dispositions/{disposition}', [DispositionController::class, 'update'])->name('dispositions.update');
Route::delete('/dispositions/{disposition}', [DispositionController::class, 'destroy'])->name('dispositions.destroy');
//COURRIERS
Route::get('/courriers', [CourrierController::class, 'index'])->name('courriers.index');
Route::get('/courriers/create', [CourrierController::class, 'create'])->name('courriers.create');
Route::post('/courriers', [CourrierController::class, 'store'])->name('courriers.store');
Route::get('/courriers/{courrier}/edit', [CourrierController::class, 'edit'])->name('courriers.edit');
Route::put('/courriers/{courrier}', [CourrierController::class, 'update'])->name('courriers.update');
Route::delete('/courriers/{courrier}', [CourrierController::class, 'destroy'])->name('courriers.destroy');
//RECEPTION DE COURRIERS 
Route::get('/reception-courriers', [ReceptionCourrierController::class, 'index'])->name('reception_courriers.index');
Route::get('/reception-courriers/create', [ReceptionCourrierController::class, 'create'])->name('reception_courriers.create');
Route::post('/reception-courriers', [ReceptionCourrierController::class, 'store'])->name('reception_courriers.store');
Route::get('/reception-courriers/{receptionCourrier}/edit', [ReceptionCourrierController::class, 'edit'])->name('reception_courriers.edit');
Route::get('/reception-courriers/{receptionCourrier}/show', [ReceptionCourrierController::class, 'show'])->name('reception_courriers.show');
Route::get('/reception-courriers/{receptionCourrier}/voir', [ReceptionCourrierController::class, 'voir'])->name('reception_courriers.voir');
Route::put('/reception-courriers/{receptionCourrier}', [ReceptionCourrierController::class, 'update'])->name('reception_courriers.update');
Route::delete('/reception-courriers/{receptionCourrier}', [ReceptionCourrierController::class, 'destroy'])->name('reception_courriers.destroy');
Route::get('/reception-courriers/{receptionCourrier}/pdf', [ReceptionCourrierController::class, 'generatePdf'])->name('reception_courriers.pdf');
Route::get('/reception-courriers/{receptionCourrier}/download', [ReceptionCourrierController::class, 'download'])->name('reception_courriers.download');


//DESTINATAIRES
Route::get('/destinataires', [DestinataireController::class, 'index'])->name('destinataires.index');
Route::get('/destinataires/create', [DestinataireController::class, 'create'])->name('destinataires.create');
Route::post('/destinataires', [DestinataireController::class, 'store'])->name('destinataires.store');
Route::get('/destinataires/{destinataire}/edit', [DestinataireController::class, 'edit'])->name('destinataires.edit');
Route::put('/destinataires/{destinataire}', [DestinataireController::class, 'update'])->name('destinataires.update');
Route::delete('/destinataires/{destinataire}', [DestinataireController::class, 'destroy'])->name('destinataires.destroy');
//Expeditaires
Route::get('/expeditaires', [ExpeditaireController::class, 'index'])->name('expeditaires.index');
Route::get('/expeditaires/create', [ExpeditaireController::class, 'create'])->name('expeditaires.create');
Route::post('/expeditaires', [ExpeditaireController::class, 'store'])->name('expeditaires.store');
Route::get('/expeditaires/{expeditaire}/edit', [ExpeditaireController::class, 'edit'])->name('expeditaires.edit');
Route::put('/expeditaires/{expeditaire}', [ExpeditaireController::class, 'update'])->name('expeditaires.update');
Route::delete('/expeditaires/{expeditaire}', [ExpeditaireController::class, 'destroy'])->name('expeditaires.destroy');
//IMPUTATIONS
Route::get('/imputations', [ImputationController::class, 'index'])->name('imputations.index');
Route::get('/imputations/create', [ImputationController::class, 'create'])->name('imputations.create');
Route::post('/imputations', [ImputationController::class, 'store'])->name('imputations.store');
Route::get('/imputations/{imputation}/edit', [ImputationController::class, 'edit'])->name('imputations.edit');
Route::put('/imputations/{imputation}', [ImputationController::class, 'update'])->name('imputations.update');
Route::delete('/imputations/{imputation}', [ImputationController::class, 'destroy'])->name('imputations.destroy');
//BORDEREAU D'ENVOI

Route::get('/bordereau-envois', [BordereauEnvoiController::class, 'index'])->name('bordereau_envois.index');
Route::get('/bordereau-envois/create', [BordereauEnvoiController::class, 'create'])->name('bordereau_envois.create');
Route::post('/bordereau-envois', [BordereauEnvoiController::class, 'store'])->name('bordereau_envois.store');
Route::get('/bordereau-envois/{bordereauEnvoi}/edit', [BordereauEnvoiController::class, 'edit'])->name('bordereau_envois.edit');
Route::put('/bordereau-envois/{bordereauEnvoi}', [BordereauEnvoiController::class, 'update'])->name('bordereau_envois.update');
Route::delete('/bordereau-envois/{bordereauEnvoi}', [BordereauEnvoiController::class, 'destroy'])->name('bordereau_envois.destroy');

Route::get('/reception_courriers/{id_reception_courrier}/pdf', [ReceptionCourrierController::class, 'generatePdf'])->name('reception_courriers.pdf');

/* Route::get('reception_courriers/{id_courrier_reception}/upload', [AttachmentController::class, 'index']);
Route::post('reception_courriers/{id_courrier_reception}/upload', [AttachmentController::class, 'store']);
Route::get('attachments/{id}/delete', [AttachmentController::class, 'destroy']); */

Route::post('/attachments/upload', [AttachmentController::class, 'upload']);
Route::get('/attachments/{attachment}', [AttachmentController::class, 'show']);

Route::get('/reception_courriers/{id_courrier_reception}/download', 'ReceptionCourrierController@downloadFile')->name('reception_courriers.download');
Route::delete('/reception_courriers/{id_courrier_reception}/delete_file', 'ReceptionCourrierController@deleteFile')->name('reception_courriers.delete_file');

});

require __DIR__.'/auth.php';
