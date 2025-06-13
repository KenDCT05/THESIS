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
            'gender' => 'required|in:male,female,other',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('GSSM2025'),
            'role' => $request->role,
            'profile_photo' => 'images/default-profile.png',
            'gender' => $request->gender,
        ]);

        return back()->with('success', 'User registered with default password "GSSM2025".');
    }

    // Show assign form
    public function showAssignForm()
    {
        $teachers = User::where('role', 'teacher')->get();
        $students = User::where('role', 'student-parent')->with('teacher')->get();
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
    public function dashboard()
    {
    $totalTeachers = User::where('role', 'teacher')->count();
    $totalStudentParents = User::where('role', 'student-parent')->count();
    $totalUsers = User::whereIn('role', ['teacher', 'student-parent'])->count();

         $recentUsers = User::whereIn('role', ['teacher', 'student-parent'])
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('dashboard.admin', compact('totalTeachers', 'totalStudentParents', 'totalUsers','recentUsers'));
    }
}
