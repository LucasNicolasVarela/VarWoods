<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

// Para los middelwares es necesario que el metodo handle reciba dos parametros
// 1 - El request que se esta haciendo a la aplicacion
// 2 - Un closure que se ejecutara despues de que el middleware, habitualmente llamado $next, que se encargara de ejecutar el siguiente middleware o el controlador si no hay mas middlewares


class VerificationAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
