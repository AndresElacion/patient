<?php

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

    // Pass the variables to the dashboard view
    return view('dashboard.dashboard', compact(
        'totalDoctors',
        'totalPatients',
        'doctors'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
