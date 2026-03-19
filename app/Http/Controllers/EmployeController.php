<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index', compact('employes'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logique pour afficher le formulaire de création d'un employé
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_employe = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:employes',
        ]);
        Employe::create($new_employe);
        return redirect()->route('employes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employe = Employe::with('voitures')->findOrFail($id);
        return view('employes.show', compact('employe'));
    }

    public function verifierModele(Request $request, $id)
    {
        $employe = Employe::with('voitures')->findOrFail($id);
        $modeleRecherche = $request->input('modele');
        $resultatVerification = $employe->verifierModeleVoiture($modeleRecherche);
 
        return view('employes.show', compact('employe', 'modeleRecherche', 'resultatVerification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Logique pour afficher le formulaire d'édition d'un employé
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);

        $updated_data = $request->validate([
            'nom' => 'sometimes|required|string',
            'prenom' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:employes,email,' . $id,
        ]);
        $employe->update($updated_data);
        return redirect()->route('employes.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('employes.index');
    }
}
