<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function dashboard()
{
    $students = Auth::user()->students;
    return view('teacher.dashboard', compact('students'));
}
}
