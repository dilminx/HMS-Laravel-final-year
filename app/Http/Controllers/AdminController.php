<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function index()
    {
        $admin = Auth::user();
        $totalDoctors = MasterUser::where('user_role_iduser_role', 3)->where('status', 1)->count();
        $totalLabAssistants = MasterUser::where('user_role_iduser_role', 4)->where('status', 1)->count();
        $totalPatients = MasterUser::where('user_role_iduser_role', 2)->where('status', 1)->count();
        $totalUsers = MasterUser::count();

        return view('admin.dashboard', compact('admin','totalDoctors', 'totalLabAssistants', 'totalPatients', 'totalUsers'));
    }

    // Show Admin Profile Page
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    // Update Admin Profile
    public function updateProfile(Request $request)
{
    $admin = Auth::user(); // Get logged-in admin

    $request->validate([
        'email' => 'required|email|unique:master_user,email,'.$admin->idmaster_user.',idmaster_user',
        'first_name' => 'required|string|max:45',
        'last_name' => 'required|string|max:45',
        'mobile_number' => 'required|string|max:12',
    ]);

    $admin->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'mobile_number' => $request->mobile_number,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

    // Show Users List
    public function manageUsers()
    {
        $users = MasterUser::where('user_role_iduser_role', '!=', 1)->get();
        return view('admin.users', compact('users'));
    }

    // Activate/Deactivate User
    public function toggleStatus($id)
    {
        $user = MasterUser::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return back()->with('success', 'User status updated successfully!');
    }

    //============ Show Add User Form ======================
    public function showAddUserForm()
{
    $doctorCategories = DoctorCategory::all(); // Fetch all categories from DB
    return view('admin.add-user', compact('doctorCategories'));
}


    // Add Doctor or Lab Assistant
    public function addUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'email' => 'required|email|unique:master_user,email',
            'password' => 'required|min:6',
            'mobile_number' => 'required|string|max:12',
            'role' => 'required|in:2,3,4', //2=patient, 3 = Doctor, 4 = Lab Assistant
            'doctor_category' => 'required_if:role,3|exists:doctor_category,iddoctor_category' // Only required for doctors
  
        ]);

      $user =  MasterUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'user_role_iduser_role' => $request->role,
            'status' => 1,
            
        ]);
        if ($request->role == 3) {
            Doctor::create([
                'master_user_idmaster_user' => $user->idmaster_user,
                'doctor_category_iddoctor_category' => $request->doctor_category,
                'specialization' => 'unknown', // Change as needed
                'work_hospital' => 'Unknown', // Change as needed
                'status' => 1,
            ]);
        }

        return redirect()->route('admin.users')->with('success', 'User added successfully!');
    }



    
    public function viewLabAssistants()
{
    $labAssistants = MasterUser::where('user_role_iduser_role', 4)->where('status', 1)->get();
    return view('admin.lab-assistants', compact('labAssistants'));
}


   

    public function adminPayment(){
        return view('admin.payment');
    }
    public function adminReport(){
        return view('admin.report');
    }


}