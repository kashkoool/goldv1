<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'customer' => \App\Http\Middleware\Customer::class,
            'store_owner' => \App\Http\Middleware\StoreOwner::class,
            'cache.customer.response' => \App\Http\Middleware\CacheCustomerResponse::class, // Add this line
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
