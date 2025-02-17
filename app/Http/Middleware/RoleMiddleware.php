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

        $user = Auth::user(); // Get the authenticated user

        // Check if the provided role exists and matches the user's role
        if (!isset($roleMapping[$role]) || $user->user_role_iduser_role !== $roleMapping[$role]) {
            return abort(403, 'Unauthorized access'); // Restrict access
        }

        // Check if the user is inactive (status = 0)
        if ($user->status == 0) {
            return redirect()->route('restricted.access');
        }

        return $next($request);
    }
}
