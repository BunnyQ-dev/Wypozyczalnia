<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'web' => [
            // Inne middleware...
            \App\Http\Middleware\CheckRole::class,
        ],
    ];

    // Inne metody...
}
