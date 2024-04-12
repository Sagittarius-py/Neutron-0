<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // User is authenticated, allow access
            return $next($request);
        }

        // User is not authenticated, redirect to login page or show an error message
        return redirect()->route('login')->with('error', 'Musisz być zalogowany by kożystać z tej funkcji');
    }
}
