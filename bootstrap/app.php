<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EmployeAUnCampus;
use App\Http\Middleware\EmployeAUneVoiture;
use App\Http\Middleware\NombrePlacesVoiture;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'employe.campus' => EmployeAUnCampus::class,
            'employe.voiture' => EmployeAUneVoiture::class,
            'voiture.places' => NombrePlacesVoiture::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
