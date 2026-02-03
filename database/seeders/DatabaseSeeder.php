<?php

namespace Database\Seeders;

use App\Models\User;
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
    $course = \App\Models\Course::create([
        'name' => 'Desarrollo Web',
        'description' => 'Fullstack Laravel & Vue'
    ]);

    \App\Models\Student::create([
        'name' => 'Usuario Prueba',
        'email' => 'test@example.com',
        'course_id' => $course->id
    ]);
}
}
