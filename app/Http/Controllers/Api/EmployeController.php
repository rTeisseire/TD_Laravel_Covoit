<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return $employes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:employes_table',
        ]);

        $employe = Employe::create($validated);
        return response()->json($employe, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Employe::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);
        $validated = $request->validate([
            'nom' => 'string',
            'prenom' => 'string',
            'email' => 'email|unique:employes_table,email,' . $id,
        ]);
        $employe->update($validated);
        return response()->json($employe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employe::destroy($id);
        return response()->json(['message' => 'Employé supprimé']);
    }
}
