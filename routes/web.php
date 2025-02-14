<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LabAssistantController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// **Admin Dashboard**
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
});

// **Patient Dashboard**
Route::middleware(['auth'])->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
});

// **Doctor Dashboard**
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
});

// **Lab Assistant Dashboard**
Route::middleware(['auth'])->group(function () {
    Route::get('/lab/dashboard', [LabAssistantController::class, 'index'])->name('lab.dashboard');
});

// **Logout Route**
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Logged out successfully!');
});
