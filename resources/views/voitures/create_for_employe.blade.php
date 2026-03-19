@extends('layouts.app')

@section('content')
<h2>Ajouter une voiture pour {{ $employe->prenom }} {{ $employe->nom }}</h2>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('employes.storeVoiture', $employe->id) }}" method="POST">
    @csrf
    <div>
        <label for="modele">Modèle :</label>
        <input type="text" name="modele" id="modele" required>
    </div>
    <div>
        <label for="nb_places">Nombre de places :</label>
        <input type="number" name="nb_places" id="nb_places" min="1" required>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection