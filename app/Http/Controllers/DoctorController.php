<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\LabTest;

class DoctorController extends Controller
{
    public function index()
    {
        // Get the currently logged-in doctor
        $doctor = Auth::user();
        return view('doctor.dashboard', compact('doctor'));
    }

    public function dashboard()
    {
        $doctorId = auth()->user()->id;
        $totalPatients = Patient::where('doctor_id', $doctorId)->count();
        $totalAppointments = Appointment::where('doctor_id', $doctorId)->count();
        $pendingLabTests = LabTest::where('doctor_id', $doctorId)->where('status', 'pending')->count();

        return view('doctor.dashboard', compact('totalPatients', 'totalAppointments', 'pendingLabTests'));
    }

    public function appointments()
    {
        $appointments = Appointment::where('doctor_id', auth()->user()->id)->get();
        return view('doctor.appointments', compact('appointments'));
    }

    public function patients()
    {
        $patients = Patient::where('doctor_id', auth()->user()->id)->get();
        return view('doctor.patients', compact('patients'));
    }

    public function feedback()
    {
        return view('doctor.feedback'); // Feedback page (to be created later)
    }
    
}
