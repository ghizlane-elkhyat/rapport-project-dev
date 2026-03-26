<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Benali',
            'parent_email' => 'parent1@test.com',
        ]);

        Student::create([
            'first_name' => 'Sara',
            'last_name' => 'Karimi',
            'parent_email' => 'parent2@test.com',
        ]);

        Student::create([
            'first_name' => 'Youssef',
            'last_name' => 'El Idrissi',
            'parent_email' => 'parent3@test.com',
        ]);

        Student::create([
            'first_name' => 'Meryem',
            'last_name' => 'Amrani',
            'parent_email' => 'copte.inst@gmail.com',
        ]);

        Student::create([
            'first_name' => 'Omar',
            'last_name' => 'Fassi',
            'parent_email' => 'parent4@test.com',
        ]);

        Student::create([
            'first_name' => 'Lina',
            'last_name' => 'Bennani',
            'parent_email' => 'parent5@test.com',
        ]);

        Student::create([
            'first_name' => 'Hassan',
            'last_name' => 'Tazi',
            'parent_email' => 'parent6@test.com',
        ]);

        Student::create([
            'first_name' => 'Salma',
            'last_name' => 'Chraibi',
            'parent_email' => 'parent7@test.com',
        ]);
    }
}
