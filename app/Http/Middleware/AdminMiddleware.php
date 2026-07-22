<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Not logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Only allow admins
        if (trim(auth()->user()->role) !== 'admin') {
            return redirect()->route('home')
                ->with('error', 'You are not authorized to access the Admin Dashboard.');
        }

        return $next($request);
    }
}