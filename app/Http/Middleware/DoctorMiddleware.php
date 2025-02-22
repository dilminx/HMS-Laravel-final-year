<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_role_iduser_role == 3) { // Only allow doctors
            return $next($request);
        }
        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}

