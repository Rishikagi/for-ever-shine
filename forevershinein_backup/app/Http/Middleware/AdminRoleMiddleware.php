<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('admin.login')->with('adminerror', 'Access denied. Admins only.');
        }
        // Check if user has 'admin' role using Spatie package
        if (method_exists($user, 'hasRole')) {
            if (!$user->hasRole('admin')) {
                return redirect()->route('admin.login')->with('adminerror', 'Access denied. Admins only.');
            }
        } else {
            // Fallback: check user_type or other attribute
            if ($user->user_type != '1') {
                return redirect()->route('admin.login')->with('adminerror', 'Access denied. Admins only.');
            }
        }
        return $next($request);
    }
}
