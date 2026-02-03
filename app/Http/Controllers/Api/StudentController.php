<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Cargamos el curso para mostrarlo en la tabla
        return Student::with('course')->get();
    }

    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return $student;
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }
}