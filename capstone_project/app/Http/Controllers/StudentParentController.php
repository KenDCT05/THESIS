<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentParentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user();

        // Get the assigned teacher
        $teacher = $student->assignedTeacher;

        // Get classmates (other students assigned to the same teacher, excluding self)
        $classmates = $teacher
            ? $teacher->students()->where('id', '!=', $student->id)->get()
            : collect();

        return view('dashboard.student-parent', compact('student', 'teacher', 'classmates'));
    }
}

