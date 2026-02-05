<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course; // Basado en tu carpeta Models

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Desarrollo Web Fullstack', 'description' => 'Aprende Laravel y Vue.js desde cero.'],
            ['name' => 'Diseño de Interfaces UI/UX', 'description' => 'Domina Figma y la experiencia de usuario.'],
            ['name' => 'Bases de Datos Avanzadas', 'description' => 'Optimización de consultas SQL y NoSQL.'],
            ['name' => 'Seguridad Informática', 'description' => 'Introducción al hacking ético.'],
            ['name' => 'Desarrollo de Apps Móviles', 'description' => 'Creación de apps con Flutter o React Native.'],
            ['name' => 'Inteligencia Artificial', 'description' => 'Modelos de lenguaje y redes neuronales.'],
            ['name' => 'Gestión de Proyectos Ágiles', 'description' => 'Metodologías Scrum y Kanban.'],
            ['name' => 'Marketing Digital', 'description' => 'Estrategias de SEO y SEM.'],
            ['name' => 'Cloud Computing', 'description' => 'Despliegue en AWS y OpenStack.'],
            ['name' => 'Programación en Python', 'description' => 'Ciencia de datos y automatización.'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}