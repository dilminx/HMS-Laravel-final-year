<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Auth;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $mainData = MasterUser::where('idmaster_user', Auth::id())->first();
        $doctor = Doctor::where('master_user_idmaster_user', Auth::id())->first();
        $reviews = Feedback::where('doctors_doctor_id', $doctor->id)->get();
    
        return view('doctor.dashboard', compact('mainData', 'doctor', 'reviews'));
    }
    public function updateProfile(Request $request, $id)
    {
        // Validate incoming data
             $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'specialization' => 'required|string|max:255',
            'work_hospital' => 'required|string|max:255',
        ]);

        // Find the doctor
        $doctor = Doctor::where('master_user_idmaster_user', $id)->first();
        if (!$doctor) {
            session()->flash('error', 'Doctor not found.');
            return redirect()->back();
        }

        // Update doctor details
        $doctor->update([
            'specialization' => $request->specialization,
            'work_hospital' => $request->work_hospital,
        ]);

        // Find the corresponding MasterUser and update its details
        $masterUser = MasterUser::where('idmaster_user', $id)->first();
        if ($masterUser) {
            $masterUser->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);
            session()->flash('success', 'Profile updated successfully!');
        } else {
            session()->flash('error', 'Master user not found.');
        }

        return redirect()->route('doctor.dashboard');
    }
}
