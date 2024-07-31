<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\SignataireController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\ReceptionCourrierController;
use App\Http\Controllers\DestinataireController;
use App\Http\Controllers\ExpeditaireController;
use App\Http\Controllers\ImputationController;
use App\Http\Controllers\BordereauEnvoiController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CourrierInterneController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

  Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/home', [DashboardController::class, 'index'])->name('home')->middleware('auth');

// Auth routes
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   /*  Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
 */
    // Permissions and roles routes
    Route::middleware(['role:super-admin|admin|agent'])->group(function () {
        Route::resource('permissions', PermissionController::class);
        Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');

        Route::resource('roles', RoleController::class);
        Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
        Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');

        Route::resource('users', UserController::class);
        Route::get('users/{userId}/delete', [UserController::class, 'destroy'])->name('users.destroy');
         // Services routes
        Route::resource('services', ServiceController::class);

        // Profils routes
        Route::resource('profils', ProfilController::class);

        // Personnels routes
        Route::resource('personnels', PersonnelController::class);

        // Signataires routes
        Route::resource('signataires', SignataireController::class);

        // Dispositions routes
        Route::resource('dispositions', DispositionController::class);

        // Courriers routes
        Route::resource('courriers', CourrierController::class);

        // Reception de courriers routes
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

        // Destinataires routes
        Route::resource('destinataires', DestinataireController::class);

        // Expeditaires routes
        Route::resource('expeditaires', ExpeditaireController::class);

        // Imputations routes
        Route::resource('imputations', ImputationController::class);
        Route::get('/fetch-courrier-details', [ImputationController::class, 'fetchCourrierDetails'])->name('fetchCourrierDetails');

        // Bordereau d'envoi routes
        Route::get('/bordereau-envois', [BordereauEnvoiController::class, 'index'])->name('bordereau_envois.index');
        Route::get('/bordereau-envois/create', [BordereauEnvoiController::class, 'create'])->name('bordereau_envois.create');
        Route::post('/bordereau-envois', [BordereauEnvoiController::class, 'store'])->name('bordereau_envois.store');
        Route::get('/bordereau-envois/{bordereauEnvoi}/edit', [BordereauEnvoiController::class, 'edit'])->name('bordereau_envois.edit');
        Route::put('/bordereau-envois/{bordereauEnvoi}', [BordereauEnvoiController::class, 'update'])->name('bordereau_envois.update');
        Route::delete('/bordereau-envois/{bordereauEnvoi}', [BordereauEnvoiController::class, 'destroy'])->name('bordereau_envois.destroy');
        Route::get('/bordereau_envois/{bordereauEnvoi}/pdf', [BordereauEnvoiController::class, 'generatePdf'])->name('bordereau_envois.pdf');
        Route::get('/bordereau_envois/{bordereauEnvoi}/voir', [BordereauEnvoiController::class, 'voir'])->name('bordereau_envois.voir');
        Route::get('{id_bordereau}/download', [BordereauEnvoiController::class, 'downloadFile'])->name('bordereau_envois.downloadFile');
        Route::get('{id_bordereau}/delete', [BordereauEnvoiController::class, 'deleteFile'])->name('bordereau_envois.deleteFile');

        // Attachments routes
        Route::post('/attachments/upload', [AttachmentController::class, 'upload']);
        Route::get('/attachments/{attachment}', [AttachmentController::class, 'show']);
        Route::get('/reception_courriers/{id_reception_courrier}/pdf', [ReceptionCourrierController::class, 'generatePdf'])->name('reception_courriers.pdf');

        Route::post('/attachments/upload', [AttachmentController::class, 'upload']);
        Route::get('/attachments/{attachment}', [AttachmentController::class, 'show']);

        Route::get('/reception_courriers/{id_courrier_reception}/download',[ReceptionCourrierController::class,'downloadFile'] )->name('reception_courriers.download');
        Route::delete('/reception_courriers/{id_courrier_reception}/delete_file', [ReceptionCourrierController::class,'deleteFile'])->name('reception_courriers.delete_file');

        Route::get('/reception_courriers/{id}/pdf', [ReceptionCourrierController::class, 'showPdf'])->name('reception_courriers.show_pdf');
        Route::get('/reception_courriers/{id}/download_pdf', [ReceptionCourrierController::class, 'downloadPdf'])->name('reception_courriers.download_pdf');

        // Courrier interne routes
        Route::resource('courrier-internes', CourrierInterneController::class);

    });

});


