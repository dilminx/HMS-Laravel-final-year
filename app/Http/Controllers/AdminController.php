<?php

namespace App\Http\Controllers;

use App\Models\LabTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\MasterUser;

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

    // Show Add User Form
    public function showAddUserForm()
    {
        return view('admin.add-user');
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
        ]);

        MasterUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'user_role_iduser_role' => $request->role,
            'status' => 1,
        ]);

        return redirect()->route('admin.users')->with('success', 'User added successfully!');
    }
    public function viewLabAssistants()
{
    $labAssistants = MasterUser::where('user_role_iduser_role', 4)->where('status', 1)->get();
    return view('admin.lab-assistants', compact('labAssistants'));
}
// ========================view lab test======================
    public function labTest(){
        $labTest = LabTest::all();
        return view('labtest.all',compact('labTest'));
    }
    public function createLabtest(){
        return view('create.labtest');
    }
    public function storeLabTest(Request $request){
        $request->validate(
            [
                'labtest_namee' => 'required|string',
                'labtest_amount' => 'required|numaric|min:0',
                'status' => "required|in:0,1"
            ]
        );
        LabTest::create([
            'labtest_name' => $request->labtest_name,
            'test_amount' => $request->test_amount,
            'status' => $request->status,
        ]);
        return redirect()->route('labTests')->with('success', 'Lab Test added successfully.');

    }
    public function editLabTest($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('lab_tests.edit', compact('labTest'));
    }

    // Update lab test details
    public function updateLabTest(Request $request, $id)
    {
        $request->validate([
            'labtest_name' => 'required|string|max:255',
            'test_amount' => 'required|numeric|min:0',
            'status' => 'required|in:0,1'
        ]);

        $labTest = LabTest::findOrFail($id);
        $labTest->update([
            'labtest_name' => $request->labtest_name,
            'test_amount' => $request->test_amount,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.labTests')->with('success', 'Lab Test updated successfully.');
    }

    // Delete a lab test
    public function deleteLabTest($id)
    {
        $labTest = LabTest::findOrFail($id);
        $labTest->delete();

        return redirect()->route('admin.labTests')->with('success', 'Lab Test deleted successfully.');
    }

}
