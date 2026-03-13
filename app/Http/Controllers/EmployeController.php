<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::all();
        return $employes;
    }
    
    public function store(Request $request)
    {
        $new_employe = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:employes',
        ]);
        $new_employe = Employe::create($new_employe);
        return $new_employe;
    }

    public function show($id)
    {
        return Employe::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);

        $updated_data = $request->validate([
            'nom' => 'sometimes|required|string',
            'prenom' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:employes,email,' . $id,
        ]);
        $employe->update($updated_data);
        return $employe;
    }

    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return $employe;
    }
}
