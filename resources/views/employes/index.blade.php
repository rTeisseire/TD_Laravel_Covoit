@extends('layouts.app')
 
@section('title', 'Liste des employés')
 
@section('content')
    <h2>Liste des employés</h2>
 
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>
                        <a href="{{ route('employes.show', $employe->id) }}" class="btn btn-info">Voir</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucun employé trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection