<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentParentController; // Make sure this is included

Route::get('/', function () {
    return view('home');
});

// Password change (shared by all roles)
Route::middleware('auth')->group(function () {
    Route::get('/change-password', function () {
        return view('auth.change-password');
    })->name('password.change');

    Route::post('/change-password', function (Request $request) {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8', 'regex:/[!@#$%^&*]/'],
        ]);

        $user = auth()->user();
        $user->update([
            'password' => bcrypt($request->password),
            'first_login' => false,
        ]);

        Auth::logout();
        return redirect('/login')->with('status', 'Password changed. Please log in again.');
    })->name('password.update');
});

// Routes that require authentication and verification
Route::middleware(['auth', 'verified'])->group(function () {

    // Redirect to role-specific dashboards
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->first_login && $user->role !== 'admin') {
            return redirect()->route('password.change');
        }

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            'student-parent' => redirect()->route('student.dashboard'),
            default => abort(403),
        };
    })->name('dashboard');

    // Admin routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.admin');
        })->name('dashboard');

        Route::get('/assign-students', [AdminController::class, 'showAssignForm'])->name('assign.form');
        Route::post('/assign-students', [AdminController::class, 'assignStudent'])->name('assign.store');

        Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AdminController::class, 'registerUser'])->name('register');
    });

    // Teacher routes
    Route::middleware('role:teacher')->group(function () {
        Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    });

    // Student-Parent routes
    Route::middleware('role:student-parent')->group(function () {
        Route::get('/student/dashboard', [StudentParentController::class, 'dashboard'])->name('student.dashboard');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
