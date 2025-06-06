<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Register a new user
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:teacher,student-parent',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('pass1234'),
            'role' => $request->role,
        ]);

        return back()->with('success', 'User registered with default password "pass1234".');
    }

    // Show assign form
    public function showAssignForm()
    {
        $teachers = User::where('role', 'teacher')->get();
        $students = User::where('role', 'student-parent')->get();
        return view('admin.assign', compact('teachers', 'students'));
    }

    // Assign student to teacher
    public function assignStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $student = User::findOrFail($request->student_id);
        $student->assigned_teacher_id = $request->teacher_id;
        $student->save();

        return back()->with('success', 'Student assigned to teacher.');
    }
     public function assign()
    {
        // Return a view for assignment (create this view)
        return view('admin.assign');
    }
}
