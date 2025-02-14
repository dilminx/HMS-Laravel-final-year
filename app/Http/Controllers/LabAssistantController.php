<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabAssistantController extends Controller
{
    public function index()
    {
        // Get the currently logged-in lab_asistant
        $lab_assistant = Auth::user();

        // Pass patient details to the view
        return view('lab.dashboard', compact('lab_assistant'));
    }
}
