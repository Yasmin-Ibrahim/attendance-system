<?php

namespace Database\Seeders;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::pluck('id');

         Parents::factory(10)
        ->state(function () use ($students) {
            return [
                'student_id' => $students->random(),
            ];
        })->create();
    }
}
