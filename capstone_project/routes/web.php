<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\LearningMaterialController;

Route::get('/', function () {
    return view('home');
});

// Shared password change routes
Route::middleware('auth')->group(function () {
    Route::get('/change-password', fn () => view('auth.change-password'))->name('password.change');

    Route::post('/change-password', function (Request $request) {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8', 'regex:/[!@#$%^&*]/'],
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password),
            'first_login' => false,
        ]);

        Auth::logout();
        return redirect('/login')->with('status', 'Password changed. Please log in again.');
    })->name('password.update');
});

// Routes requiring authentication and verified email
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard redirection based on role
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

    /**
     * Admin Routes
     */
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/assign-students', [AdminController::class, 'showAssignForm'])->name('assign.form');
        Route::post('/assign-students', [AdminController::class, 'assignStudent'])->name('assign.store');
        Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AdminController::class, 'registerUser'])->name('register');
    });

    /**
     * Teacher Routes
     */
    Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');

        // Materials management
        Route::get('/materials', [LearningMaterialController::class, 'index'])->name('materials.index'); // list
        Route::get('/materials/add', [LearningMaterialController::class, 'create'])->name('materials.form'); // form
        Route::post('/materials', [LearningMaterialController::class, 'store'])->name('materials.store'); // save

        // Edit/update
        Route::get('/materials/{id}/edit', [LearningMaterialController::class, 'edit'])->name('materials.edit');
        Route::put('/materials/{id}', [LearningMaterialController::class, 'update'])->name('materials.update');

        // Delete
        Route::delete('/materials/{id}', [LearningMaterialController::class, 'destroy'])->name('materials.destroy');
    });

    /**
     * Student-Parent Routes
     */
    Route::middleware('role:student-parent')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentParentController::class, 'dashboard'])->name('dashboard');
        Route::get('/materials', [LearningMaterialController::class, 'studentIndex'])->name('materials');
    });

    /**
     * Profile Routes
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
