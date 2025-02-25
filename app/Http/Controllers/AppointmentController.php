<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('doctor.appointments');
    }

    public function fetchAppointments()
    {
        $appointments = Appointment::where('doctor_id', Auth::id())->get();
        return response()->json($appointments);
    }

    public function store(Request $request)
    {
            Appointment::create([
            'doctor_id' => Auth::id(),
            'appointment_time' => $request->appointment_time,
            'status' => 'available'

        ]);
        return response()->json(['message' => 'Appointment added successfully!']);
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        if ($appointment->status !== 'confirmed') {
            $appointment->update(['status' => 'cancelled']);
            return response()->json(['message' => 'Appointment cancelled successfully!']);
        }
        return response()->json(['error' => 'Cannot cancel confirmed appointment'], 403);
    }
}
