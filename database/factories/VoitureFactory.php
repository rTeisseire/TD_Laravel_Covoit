<?php

namespace Database\Factories;

use App\Models\Voiture;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Voiture::class;

    public function definition(): array
    {
        // Petite liste de modèles de voitures pour avoir des données un peu réalistes
        $modeles = ['Peugeot 208', 'Renault Clio', 'Citroën C3', 'Volkswagen Golf', 'Toyota Yaris', 'Dacia Sandero'];

        return [
            'modele' => $this->faker->randomElement($modeles), // Pioche un modèle au hasard dans la liste
            'nb_places' => $this->faker->numberBetween(2, 7),  // Un nombre de places entre 2 et 7
            
            // Si jamais on crée une voiture sans passer par le seeder d'employé, 
            // ça créera un employé à la volée pour respecter la clé étrangère.
            'id_employe' => Employe::factory(), 
        ];
    }
}
