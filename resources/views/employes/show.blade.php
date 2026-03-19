@extends('layouts.app')

@section('title', 'Profil Employé')

@section('content')
    <h2><u>Profil Employé</u></h2>

    {{-- Informations principales (partial réutilisable) --}}
    @include('partials.employe-info', ['employe' => $employe])

    {{-- Section Activité --}}
    <div class="section">
        <h3><u>Activité</u></h3>
        <p><strong>Statut :</strong> {{ $employe->retournerStatutEmploye() }}</p>
    </div>

    {{-- Vérification de modèle de voiture --}}
    <div class="section">
        <h3><u>Voiture</u></h3>
        <form action="{{ route('employes.verifierModele', $employe->id) }}" method="POST" class="form-inline">
            @csrf
            <span>Voiture</span>
            <input type="text" name="modele" placeholder="Modèle à chercher" value="{{ $modeleRecherche ?? '' }}">
            <button type="submit" class="btn btn-info">Vérifier</button>
            @if(isset($resultatVerification))
                <strong>{{ $resultatVerification ? 'Yes' : 'No' }}</strong>
            @else
                <span>YES/NO</span>
            @endif
        </form>
    </div>

    {{-- Liste des voitures de l'employé --}}
    <div class="section">
        @forelse ($employe->voitures as $voiture)
            <p>
                <strong>Voiture {{ $loop->iteration }}</strong>
                <a href="{{ route('voitures.show', $voiture->id) }}" class="btn btn-info">Voir</a>
            </p>
        @empty
            <p>Aucune voiture.</p>
        @endforelse
    </div>

    {{-- Message d'erreur bus en rouge --}}
    @if(session('bus_error'))
        <div style="color: red; font-weight: bold; margin: 10px 0;">
            {{ session('bus_error') }}
        </div>
    @endif

    {{-- Message d'erreur général --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
@endsection