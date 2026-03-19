<?php

use App\Http\Controllers\Api\EmployeController;
use App\Http\Controllers\Api\VoitureController;
use App\Http\Controllers\Api\CampusController;
use App\Http\Controllers\Api\TrajetController;

Route::apiResource('employes', EmployeController::class);
Route::apiResource('voitures', VoitureController::class);
Route::apiResource('campuses', CampusController::class);
Route::apiResource('trajets', TrajetController::class);