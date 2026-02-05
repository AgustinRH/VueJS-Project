<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student; // Basado en tu carpeta Models
use App\Models\Course;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos todos los IDs de los cursos creados arriba
        $courseIds = Course::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            Student::create([
                'name' => "Estudiante Ejemplo $i",
                'email' => "estudiante$i@academia.com",
                // Asignamos un curso aleatorio de la lista
                'course_id' => $courseIds[array_rand($courseIds)],
            ]);
        }
    }
}