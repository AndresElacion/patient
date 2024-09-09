<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmetController;
use App\Http\Controllers\DoctorController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    // 2 = doctor, 3 = patient
    $totalDoctors = User::where('role_id', 2)->count();
    $totalPatients = User::where('role_id', 3)->count();
    $doctors = User::orderBy('created_at', 'DESC')->where('role_id', 2)->take(5)->get();
    $patients = User::orderBy('created_at', 'DESC')->where('role_id', 3)->take(5)->get();
    $departments = User::orderBy('department', 'DESC')->take(5)->get();

    // Pass the variables to the dashboard view
    return view('dashboard.dashboard', compact(
        'totalDoctors',
        'totalPatients',
        'doctors',
        'patients',
        'departments'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index'); // List doctors
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit'); // Edit specific doctor
    Route::patch('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update'); // Update specific doctor
});

Route::middleware('auth')->group(function () {
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
