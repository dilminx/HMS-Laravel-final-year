<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Auth::user(); // Get logged-in admin details
        return view( 'admin.dashboard', compact('admin'));
    }
}
