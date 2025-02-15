<?php 

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        
            switch ($user->user_role_iduser_role) { // Corrected field name
                case 1:
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
                case 2:
                    return redirect()->route('patient.dashboard')->with('success', 'Welcome Patient!');
                case 3:
                    return redirect()->route('doctor.dashboard')->with('success', 'Welcome Doctor!');
                case 4:
                    return redirect()->route('lab.dashboard')->with('success', 'Welcome Lab Assistant!');
                default:
                    return redirect()->route('welcome')->with('success', 'Login Successful!');
            }
        }
        

        return back()->with('error', 'Invalid email or password');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully');
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle patient registration
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'email' => 'required|email|unique:master_user,email',
            'password' => 'required|min:6|confirmed',
            'mobile_number' => 'required|string|max:12',
        ]);

        MasterUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'user_role_iduser_role' => 2, // Assign "Patient" Role
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/login')->with('success', 'Registration successful! You can now login.');
    }

    // Add Doctor or Lab Assistant (Admin only)
    public function addUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'email' => 'required|email|unique:master_user,email',
            'password' => 'required|min:6',
            'mobile_number' => 'required|string|max:12',
            'role' => 'required|in:3,4', // 3 = Doctor, 4 = Lab Assistant
        ]);

        MasterUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'user_role_iduser_role' => $request->role, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'User added successfully!');
    }
}
