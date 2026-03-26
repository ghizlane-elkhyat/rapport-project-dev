<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    public function run(): void
    {

        Formation::create([
            'title' => 'Développement Web',
            'description' => 'HTML, CSS, JavaScript, Laravel',
            'start_date' => '2026-01-01',
            'end_date' => '2026-06-01',
        ]);

        Formation::create([
            'title' => 'Scratch',
            'description' => 'Introduction à la programmation avec Scratch',
            'start_date' => '2026-02-01',
            'end_date' => '2026-07-01',
        ]);

        Formation::create([
            'title' => 'Robotique VEX',
            'description' => 'Construction et programmation de robots VEX',
            'start_date' => '2026-03-01',
            'end_date' => '2026-08-01',
        ]);

        Formation::create([
            'title' => 'Robotique Arduino',
            'description' => 'Programmation et électronique avec Arduino',
            'start_date' => '2026-03-15',
            'end_date' => '2026-09-01',
        ]);

        Formation::create([
            'title' => 'Tkinter',
            'description' => 'Création d’interfaces graphiques en Python avec Tkinter',
            'start_date' => '2026-04-01',
            'end_date' => '2026-09-01',
        ]);

        Formation::create([
            'title' => 'Game Development',
            'description' => 'Création de jeux vidéo et logique de game design',
            'start_date' => '2026-04-15',
            'end_date' => '2026-10-01',
        ]);
    }
}
