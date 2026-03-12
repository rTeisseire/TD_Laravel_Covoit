<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $table = 'trajets_table';

    protected $fillable = ['id_campus_depart', 'id_campus_arrivee', 'id_voiture'];

    public function campusDepart()
    {
        return $this->belongsTo(Campus::class, 'id_campus_depart');
    }

    public function campusArrivee()
    {
        return $this->belongsTo(Campus::class, 'id_campus_arrivee');
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'id_voiture');
    }

    public function passagers()
    {
        return $this->belongsToMany(Employe::class, 'est_passager_migration', 'id_trajet', 'id_employe')->withPivot('date_inscription'); 
    }
}
