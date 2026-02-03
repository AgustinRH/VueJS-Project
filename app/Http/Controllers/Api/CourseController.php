<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Cargamos los estudiantes para que el .reduce funcione en Vue
        return Course::with('students')->get();
    }

    public function store(Request $request)
    {
        return Course::create($request->all());
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return $course;
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return response()->noContent();
    }
}