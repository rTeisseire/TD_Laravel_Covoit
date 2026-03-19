<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehiculeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employes', EmployeController::class);

Route::get('/vehicules/filtrer-places', [VehiculeController::class, 'filtrerParNombreDePlaces']);
Route::get('/vehicules/filtrer-modele', [VehiculeController::class, 'filtrerParModele']);

Route::resource('vehicules', VehiculeController::class);
