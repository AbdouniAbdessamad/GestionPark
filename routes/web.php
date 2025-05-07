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

Route::get('/', function () {
    return view('welcome');
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
});

require __DIR__.'/auth.php';
