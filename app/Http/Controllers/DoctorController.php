<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        // Get the currently logged-in doctor
        $doctor = Auth::user();

        // Pass doctor details to the view
        return view('doctor.dashboard', compact('doctor'));
    }
}
