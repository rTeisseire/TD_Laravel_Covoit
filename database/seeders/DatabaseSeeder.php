<?php

namespace Database\Seeders;

use App\Models\Employe;
use App\Models\Voiture;
use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $campuses = [
            ['description' => 'Campus Paris', 'adresse' => '1 rue de Paris, 75001 Paris', 'type' => 'principal'],
            ['description' => 'Campus Lyon', 'adresse' => '10 avenue de Lyon, 69001 Lyon', 'type' => 'secondaire'],
            ['description' => 'Campus Bordeaux', 'adresse' => '5 place de Bordeaux, 33000 Bordeaux', 'type' => 'secondaire'],
        ];

        foreach ($campuses as $data) {
            Campus::create($data);
        }

        $allCampuses = Campus::all();

        Employe::factory()->count(10)->create()->each(function ($employe) use ($allCampuses) {
            $nbVoitures = rand(0, 2);

            if ($nbVoitures > 0) {
                Voiture::factory()->count($nbVoitures)->create([
                    'id_employe' => $employe->id
                ]);
            }

            // Associer l'employé à 1 ou 2 campus aléatoires
            $campusIds = $allCampuses->random(rand(1, 2))->pluck('id');
            $employe->campuses()->attach($campusIds);
        });
    }
}
