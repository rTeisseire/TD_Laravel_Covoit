<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voiture = Voiture::all();
        return $voiture;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logique pour afficher le formulaire de création d'une voiture
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_voiture = $request->validate([
            'modele' => 'required|string',
            'marque' => 'required|string',
            'id_employe' => 'required|exists:employes,id',
        ]);
        Voiture::create($new_voiture);
        return $new_voiture;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Voiture::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Logique pour afficher le formulaire d'édition d'une voiture
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $voiture = Voiture::findOrFail($id);

        $updated_data = $request->validate([
            'modele' => 'sometimes|required|string',
            'marque' => 'sometimes|required|string',
            'id_employe' => 'sometimes|required|exists:employes,id',
        ]);
        $voiture->update($updated_data);
        return $voiture;    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voiture = Voiture::findOrFail($id);
        $voiture->delete();
        return $voiture;
    }
}
