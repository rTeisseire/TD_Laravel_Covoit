<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campus;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Campus::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'adresse' => 'required|string',
            'type' => 'required|string',
        ]);
        $campus = Campus::create($validated);
        return response()->json($campus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Campus::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campus = Campus::findOrFail($id);
        $validated = $request->validate([
            'description' => 'string',
            'adresse' => 'string',
            'type' => 'string',
        ]);
        $campus->update($validated);
        return response()->json($campus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Campus::destroy($id);
        return response()->json(['message' => 'Campus supprimé']);
    }
}
