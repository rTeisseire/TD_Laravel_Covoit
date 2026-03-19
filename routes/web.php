<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VoitureController;

Route::get('/', [EmployeController::class, 'index']);

Route::post('/employes/{id}/verifier-modele', [EmployeController::class, 'verifierModele'])->name('employes.verifierModele');

Route::resource('employes', EmployeController::class);

Route::get('/voitures/filtrer-places', [VoitureController::class, 'filtrerParNombreDePlaces'])->name('voitures.filtrerPlaces');
Route::get('/voitures/filtrer-modele', [VoitureController::class, 'filtrerParModele'])->name('voitures.filtrerModele');

Route::resource('voitures', VoitureController::class);

Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');

Route::get('/employes/{employe}', [EmployeController::class, 'show'])
    ->middleware(['employe.campus', 'employe.voiture'])
    ->name('employes.show');

Route::get('/employes/{employe}/ajouter-voiture', [VoitureController::class, 'createForEmploye'])
    ->name('employes.addVoitureForm');
Route::post('/employes/{employe}/ajouter-voiture', [VoitureController::class, 'storeForEmploye'])
    ->name('employes.storeVoiture');

Route::get('/voitures/{voiture}', [VoitureController::class, 'show'])
    ->middleware('voiture.places')
    ->name('voitures.show');
