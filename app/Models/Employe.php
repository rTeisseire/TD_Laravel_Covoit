<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes_table';

    protected $fillable = ['nom', 'prenom', 'email'];

    // Un employé possède plusieurs voitures (1..*)
    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }

    // Un employé fréquente plusieurs campus (*..*)
    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'employe_campus');
    }

    // Un employé est passager de plusieurs trajets (*..*)
    public function trajets()
    {
        return $this->belongsToMany(Trajet::class, 'employe_trajet')->withPivot('date_inscription');
    }

    public function compterVoitures()
    {
        return $this->voitures()->count();
    }

    public function verifierModeleVoiture($modele)
    {
        return $this->voitures()->where('modele', $modele)->exists();
    }

    public function retournerStatutEmploye()
    {
        if ($this->voitures()->count() == 0) {
            return 'Pas conducteur';
        } elseif ($this->voitures()->count() == 1) {
            return 'Conducteur';
        } else {
            return 'Conducteur très actif';
        }
    }
}
