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
