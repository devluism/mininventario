<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::findOrFail($request->auth_user_id);

        if ($user->admin == 0)
        {
            abort(403, "No tienes permisos de acceder a esta página.");
        }
        return $next($request);    
    }
}
