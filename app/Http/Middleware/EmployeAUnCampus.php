<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employe;
use Symfony\Component\HttpFoundation\Response;

class EmployeAUnCampus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employe = Employe::find($request->route('employe'));

        if (!$employe || $employe->campuses()->count() == 0) {
            return redirect()->route('employes.index')
                ->with('error', 'Cet employé n\'appartient à aucun campus.');
        }

        return $next($request);
    }
}
