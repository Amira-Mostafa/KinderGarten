<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isNormal;
use App\Http\Middleware\isTeacher;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    
    ->withMiddleware(function (Middleware $middleware) {
      $middleware->alias([
        'isAdmin' => isAdmin::class,
        'isNormal' => isNormal::class,
        'isTeacher' => isTeacher::class,
      ]);      
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
