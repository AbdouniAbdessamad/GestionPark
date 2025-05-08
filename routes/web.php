<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AutomobileController;
use App\Http\Controllers\InventaireController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\DemandeInventaireController;
use App\Http\Controllers\AdminDemandeController;
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Automobile routes
    Route::resource('automobiles', AutomobileController::class);
    Route::resource('inventaires', InventaireController::class);
    Route::resource('fournisseurs', FournisseurController::class);

    // User routes
    Route::resource('users', UserController::class);
    Route::resource('demandes', DemandeController::class);
    Route::get('/demandesautomobile',[DemandeController::class,'automobile'])->name('demandes.automobile');

    // Congé routes
    Route::resource('conges', CongeController::class)->middleware(['auth']);

    // Demande Inventaire routes
    Route::resource('demande-inventaires', DemandeInventaireController::class)->middleware(['auth']);
    Route::get('/indexa',[DemandeController::class,'indexa'])->name('demandes.indexa');

    // Admin routes for managing requests
    Route::middleware(['auth'])->group(function () {
        // Vehicle request routes
        Route::get('/admin', [AdminDemandeController::class, 'index'])->name('admin.index');
        Route::get('/admin/all', [AdminDemandeController::class, 'allDemande'])->name('admin.all');
        Route::get('/admin/auto', [AdminDemandeController::class, 'auto'])->name('admin.auto');
        Route::get('/admin/allauto', [AdminDemandeController::class, 'allauto'])->name('admin.allauto');
        Route::get('/admin/usingauto', [AdminDemandeController::class, 'usingauto'])->name('admin.usingauto');
        Route::get('/admin/auto-history', [AdminDemandeController::class, 'autoHistory'])->name('admin.auto-history');
        Route::post('/admin/return-auto/{id}', [AdminDemandeController::class, 'returnAuto'])->name('admin.return-auto');
        Route::post('/admin/validate/{id}', [AdminDemandeController::class, 'validateDemande'])->name('admin.validate');
        Route::post('/admin/reject/{id}', [AdminDemandeController::class, 'rejectDemande'])->name('admin.reject');

        // Material request routes
        Route::get('/admin/materiel', [AdminDemandeController::class, 'DemandeMateriel'])->name('admin.materiel');
        Route::get('/admin/materiel/history', [AdminDemandeController::class, 'materielHistory'])->name('admin.materiel.history');
        Route::get('/admin/allmateriel', [AdminDemandeController::class, 'allMateriel'])->name('admin.allmateriel');
        Route::post('/admin/validate-materiel/{id}', [AdminDemandeController::class, 'validateMateriel'])->name('admin.validatemateriel');
        Route::post('/admin/rejectmateriel/{id}', [AdminDemandeController::class, 'rejectMateriel'])->name('admin.rejectmateriel');

        // Leave request routes
        Route::get('/admin/conge', [AdminDemandeController::class, 'DemandeConge'])->name('admin.conge');
        Route::get('/admin/allconge', [AdminDemandeController::class, 'allConge'])->name('admin.allconge');
        Route::post('/admin/validateconge/{id}', [AdminDemandeController::class, 'validateConge'])->name('admin.validateconge');
        Route::post('/admin/rejectconge/{id}', [AdminDemandeController::class, 'rejectConge'])->name('admin.rejectconge');
    });
});

require __DIR__.'/auth.php';
