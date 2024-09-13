<?php

use App\Models\User;
use App\Models\Billing;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmetController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    // 2 = doctor, 3 = patient, 4 = staffs/nurses
    $totalDoctors = User::where('role_id', 2)->count();
    $totalPatients = User::where('role_id', 3)->count();
    $totalStaffs = User::where('role_id', 4)->count();
    $totalAppointment = Billing::where('status', 'pending')->count();
    $doctors = User::orderBy('created_at', 'DESC')->where('role_id', 2)->take(5)->get();
    $patients = User::orderBy('created_at', 'DESC')->where('role_id', 3)->take(5)->get();

    // Fetch the latest attendance status for doctors
    $doctors = User::with(['attendances' => function ($query) {
        $query->latest()->limit(1);
    }])
    ->where('role_id', 2)
    ->orderBy('created_at', 'DESC')
    ->take(5)
    ->get()
    ->map(function ($doctor) {
        // Determine the status based on the latest attendance record
        $latestAttendance = $doctor->attendances->first();
        $doctor->status = $latestAttendance ? $latestAttendance->status : 'offline';
        return $doctor;
    });

    // Fetch unique departments
    $departments = User::select('department')->distinct()->orderBy('department', 'DESC')->get();

    // Pass the variables to the dashboard view
    return view('dashboard.dashboard', compact(
        'totalDoctors',
        'totalPatients',
        'doctors',
        'patients',
        'departments',
        'totalStaffs',
        'totalAppointment'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index'); // List doctors
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit'); // View profile specific doctor
    Route::patch('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update'); // Update specific doctor
});

Route::middleware('auth')->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('patient.index'); // List patients
    Route::get('/patient/{id}/edit', [PatientController::class, 'edit'])->name('patient.edit'); // View profile specific patient
    Route::patch('/patient/{id}/notes', [PatientController::class, 'update'])->name('patient.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/staffs', [StaffController::class, 'index'])->name('staff.index'); // List staffs
    Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit'); // View profile specific staff
    Route::patch('/staff/{id}/notes', [StaffController::class, 'update'])->name('staff.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
});

Route::prefix('patients/{patientId}/billing')->middleware('auth')->group(function () {
    Route::get('/', [BillingController::class, 'index'])->name('billing.index');
    Route::get('/create', [BillingController::class, 'create'])->name('billing.create');
    Route::post('/store', [BillingController::class, 'store'])->name('billing.store');
    Route::patch('/{billId}/update-status', [BillingController::class, 'updateStatus'])->name('billing.updateStatus');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
