<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect('/uzytkownicy'); // Редирект адміністратора на /admin/dashboard
        }

        return redirect('/'); // Редирект звичайного користувача на головну сторінку
    }
}
