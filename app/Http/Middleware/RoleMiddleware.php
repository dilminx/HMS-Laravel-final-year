<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect if not logged in
        }

        $roleMapping = [
            'admin' => 1,
            'patient' => 2,
            'doctor' => 3,
            'lab-assistant' => 4,
        ];

        $userRole = Auth::user()->user_role_iduser_role; // Get logged-in user role

        if (!isset($roleMapping[$role]) || $userRole !== $roleMapping[$role]) {
            return abort(403, 'Unauthorized access'); // Restrict access
        }

        return $next($request);
    }
}
