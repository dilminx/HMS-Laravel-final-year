<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        // Get the currently logged-in patient
        $patient = Auth::user();

        // Pass patient details to the view
        return view('patient.dashboard', compact('patient'));
    }
}
