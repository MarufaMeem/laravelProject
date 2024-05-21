<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Assuming you store the user's role in the session
        $userRole = $request->session()->get('user_role');

        if ($userRole && $userRole === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
