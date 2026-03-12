<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    // On spécifie le nom exact de la table
    protected $table = 'campuses_table';

    protected $fillable = ['description', 'adresse', 'type'];

    // Relation (*..*) : Un campus est fréquenté par plusieurs employés
    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'frequenter_table', 'id_campus', 'id_employe');
    }

    // Relation (1..*) : Un campus a plusieurs trajets au départ
    public function trajetsDepart()
    {
        return $this->hasMany(Trajet::class, 'id_campus_depart');
    }

    // Relation (1..*) : Un campus a plusieurs trajets à l'arrivée
    public function trajetsArrivee()
    {
        return $this->hasMany(Trajet::class, 'id_campus_arrivee');
    }
}