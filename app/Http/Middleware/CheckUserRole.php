<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Load role if not already loaded
        if (!$user->relationLoaded('role')) {
            $user->load('role');
        }

        if (!$user->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

