<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use Symfony\Component\HttpFoundation\Response;

class TesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $role): Response
    {
        dd($role);
        return $next($request);
    }
}
