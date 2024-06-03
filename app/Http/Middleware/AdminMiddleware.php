<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Sprawdź, czy zalogowany użytkownik jest administratorem
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Brak uprawnień administratora.');
        }

        return $next($request);
    }
}
