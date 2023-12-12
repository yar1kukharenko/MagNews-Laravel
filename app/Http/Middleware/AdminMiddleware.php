<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role !== User::ROLE_ADMIN) {
            Auth::logout();
            return redirect('/login')->with('error', 'У вас нет доступа к этой странице');

        }
        return $next($request);
    }
}
