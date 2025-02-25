<?php 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LabAssistantController;

// =========================== Home Route ===========================
Route::get('/', function () {
    return view('welcome');
});

// =========================== Authentication Routes ===========================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/restricted', function () {
    return view('restricted');
})->name('restricted.access');

// =========================== Admin Routes ===========================
Route::middleware(['auth', 'role:admin'])->group(function () { 
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
   
    Route::get('/admin/doctors-list', [AdminController::class, 'doctorsList'])->name('admin.doctors');
    Route::get('/admin/user/toggle-status/{id}', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');

     
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::post('/admin/toggle-status/{id}', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');
    Route::get('/admin/add-user', [AdminController::class, 'showAddUserForm'])->name('admin.addUser');
    Route::post('/admin/add-user', [AdminController::class, 'addUser']);
    
    Route::get('/admin/payment', [AdminController::class, 'adminPayment'])->name('admin.payment');
    Route::get('/admin/report', [AdminController::class, 'adminReport'])->name('admin.report');
});

// =========================== Patient Routes ===========================
Route::middleware(['auth', 'role:patient'])->group(function () {  
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
});

// =========================== Doctor Routes ===========================
Route::middleware(['auth', 'role:doctor'])->group(function () {  
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::post('/doctor/update/{id}', [DoctorController::class, 'updateProfile'])->name('doctor.update');
    Route::get('/doctor/appointments', [AppointmentController::class, 'index']);
    Route::get('/doctor/appointments/fetch', [AppointmentController::class, 'fetchAppointments']);
    Route::post('/doctor/appointments/store', [AppointmentController::class, 'store']);
    Route::post('/doctor/appointments/cancel/{id}', [AppointmentController::class, 'cancel']);
});

// =========================== Lab Assistant Routes ===========================
Route::middleware(['auth', 'role:lab-assistant'])->group(function () {  
    Route::get('/lab/dashboard', [LabAssistantController::class, 'index'])->name('lab.dashboard');
});

// =========================== Logout Route ===========================
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Logged out successfully!');
})->name('logout');
