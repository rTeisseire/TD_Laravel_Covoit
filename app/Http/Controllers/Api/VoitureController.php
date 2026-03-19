<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voiture;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::with('proprietaire')->get();
        return $voitures;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modele' => 'required|string',
            'nb_places' => 'required|integer|min:1',
            'id_employe' => 'required|exists:employes_table,id',
        ]);
        $voiture = Voiture::create($validated);
        return response()->json($voiture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Voiture::with('proprietaire')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $voiture = Voiture::findOrFail($id);
        $validated = $request->validate([
            'modele' => 'string',
            'nb_places' => 'integer|min:1',
            'id_employe' => 'exists:employes_table,id',
        ]);
        $voiture->update($validated);
        return response()->json($voiture);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Voiture::destroy($id);
        return response()->json(['message' => 'Voiture supprimée']);
    }
}
