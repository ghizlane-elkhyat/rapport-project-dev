<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationStudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('formation_student')->insert([

            ['formation_id' => 1, 'student_id' => 1],
            ['formation_id' => 1, 'student_id' => 2],
            ['formation_id' => 2, 'student_id' => 3],
            ['formation_id' => 1, 'student_id' => 4],
            ['formation_id' => 2, 'student_id' => 4],

            ['formation_id' => 3, 'student_id' => 5],
            ['formation_id' => 4, 'student_id' => 6],
            ['formation_id' => 5, 'student_id' => 7],
            ['formation_id' => 6, 'student_id' => 8],

            ['formation_id' => 3, 'student_id' => 1],
            ['formation_id' => 4, 'student_id' => 2],
            ['formation_id' => 5, 'student_id' => 3],
            ['formation_id' => 6, 'student_id' => 4],
        ]);
    }
}
