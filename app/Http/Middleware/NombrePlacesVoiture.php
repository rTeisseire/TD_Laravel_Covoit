<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Voiture;
use Symfony\Component\HttpFoundation\Response;

class NombrePlacesVoiture
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $voiture = Voiture::find($request->route('voiture'));

        if (!$voiture || $voiture->nb_places >= 8) {
            // Rester sur la vue n°2 avec message d'erreur en rouge
            return back()->with('bus_error', 'Visualisation des bus en cours');
        }

        return $next($request);
    }
}
