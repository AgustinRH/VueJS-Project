<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Creamos una lista de 10 cursos variados
        $nombresCursos = [
            'Desarrollo Web', 'Diseño UI/UX', 'Bases de Datos', 
            'Seguridad IT', 'Apps Móviles', 'IA Generativa', 
            'Metodologías Ágiles', 'Marketing Digital', 
            'Cloud Computing', 'Python Data Science'
        ];

        $cursosCreados = [];

        foreach ($nombresCursos as $nombre) {
            $cursosCreados[] = Course::create([
                'name' => $nombre,
                'description' => "Curso profesional de $nombre con certificación."
            ]);
        }

        // 2. Creamos al menos 10 estudiantes distribuidos aleatoriamente
        for ($i = 1; $i <= 15; $i++) {
            // Seleccionamos un curso al azar de nuestra lista de creados
            $cursoAleatorio = $cursosCreados[array_rand($cursosCreados)];

            Student::create([
                'name' => "Estudiante Ejemplo $i",
                'email' => "estudiante$i@academia.com",
                'course_id' => $cursoAleatorio->id
            ]);
        }
    }
}