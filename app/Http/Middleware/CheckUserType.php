<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Redirect based on user type
        if ($user->user_type == 'candidate') {
            return redirect()->route('candidate_dashboard');
        } elseif ($user->user_type == 'employer') {
            return redirect()->route('employer_dashboard');
        }

        // Default behavior
        return $next($request);
    }
}

