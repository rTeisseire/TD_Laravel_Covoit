<?php

namespace Database\Seeders;

use App\Models\Employe;
use App\Models\Voiture;
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
        Employe::factory()->count(10)->create()->each(function ($employe) {
            
            $nbVoitures = rand(0, 2);
            
            if ($nbVoitures > 0) {
                Voiture::factory()->count($nbVoitures)->create([
                    'id_employe' => $employe->id
                ]);
            }
        });
    }
}
