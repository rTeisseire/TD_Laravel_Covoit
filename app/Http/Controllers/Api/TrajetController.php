<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trajet;

class TrajetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Trajet::with(['campusDepart', 'campusArrivee', 'voiture'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_campus_depart' => 'required|exists:campuses_table,id',
            'id_campus_arrivee' => 'required|exists:campuses_table,id',
            'id_voiture' => 'required|exists:voitures_table,id',
        ]);
        $trajet = Trajet::create($validated);
        return response()->json($trajet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Trajet::with(['campusDepart', 'campusArrivee', 'voiture'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trajet = Trajet::findOrFail($id);
        $validated = $request->validate([
            'id_campus_depart' => 'exists:campuses_table,id',
            'id_campus_arrivee' => 'exists:campuses_table,id',
            'id_voiture' => 'exists:voitures_table,id',
        ]);
        $trajet->update($validated);
        return response()->json($trajet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Trajet::destroy($id);
        return response()->json(['message' => 'Trajet supprimé']);
    }
}
