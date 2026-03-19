<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employe;
use Symfony\Component\HttpFoundation\Response;

class EmployeAUneVoiture
{
    public function handle(Request $request, Closure $next): Response
    {
        $employe = Employe::find($request->route('employe'));

        if (!$employe || $employe->voitures()->count() == 0) {
            return redirect()->route('employes.addVoitureForm', $employe->id)
                ->with('error', 'Cet employé ne possède aucune voiture. Veuillez en ajouter une.');
        }

        return $next($request);
    }
}
