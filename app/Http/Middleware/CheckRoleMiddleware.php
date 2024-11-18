<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permission): Response
    {
        if(Auth::user() !== null)
        {
            if(in_array(Auth::user()->roles[0]->role, $permission))
                return $next($request);
            else abort(403);
        }
        else
        {
            return redirect()->route('login.index');
        }
    }
}
