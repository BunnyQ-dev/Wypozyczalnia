<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\AdminMiddleware;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Додайте сюди ваші глобальні middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // Інші middleware...
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
        'admin' => AdminMiddleware::class,
    ];

}
