@extends('layouts.app')

@section('title', 'Détails Voiture')

@section('content')
    <h2><u>Voiture</u></h2>

    <table class="info-table">
        <thead>
            <tr>
                <th>Modèle</th>
                <th>Nb Place</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $voiture->modele }}</td>
                <td>{{ $voiture->nb_places }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Propriétaire --}}
    <div class="section">
        <h3><u>Propriétaire</u></h3>
        @include('partials.employe-info', ['employe' => $voiture->proprietaire])
    </div>
@endsection