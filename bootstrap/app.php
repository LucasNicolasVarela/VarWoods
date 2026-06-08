<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Session;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //Acá vamos a configurar a donde vamos a redireccionar al usuario cuando intente acceder a una ruta protegida sin estar autenticado.
        /* $middleware->redirectGuestsTo('/iniciar-sesion'); */ // Esta forma es pasando directamente la URL
        $middleware->redirectGuestsTo( function() {
            Session::flash('feedback.message', 'Debes iniciar sesión para acceder a esta página.'); // Esto es para mostrar un mensaje de feedback al usuario cuando intente acceder a una ruta protegida sin estar autenticado.
            Session::flash('feedback.type', 'danger'); // Esto es para mostrar un mensaje de feedback al usuario cuando intente acceder a una ruta protegida sin estar autenticado.
            return route('login.show');
        });

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
