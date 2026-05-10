<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function process(Request $request){
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        // Es mejor dejarlo con la fachada para que no de error el editor ademas de que permite el autocompletar
        if (Auth::attempt($credentials) == false) {
            // Si la autenticación es incorrecta:
            return redirect()
                ->route('login.show')
                ->withInput()
                ->with('feedback.message', 'Credenciales incorrectas, por favor intente de nuevo.');
        }

        // Si la autenticación es correcta, redirigir al usuario al listado de produtos
        return redirect()
            ->route('productos.index')
            ->with('feedback.message', '¡Bienvenido ' . Auth::user()->email . '!');
    }

    public function logout(Request $request){
        Auth::logout();


        // Para mejorar la seguridad del sitio y resguardar de "session fixation attacks" es recomendable regenerar la sesión de Laravel y recrear el token CSRF

        $request->session()->invalidate(); // Invalidamos la sesión para que se genere una nueva
        $request->session()->regenerateToken(); // Regeneramos el token CSRF para evitar ataques de falsificación de solicitudes entre sitios (CSRF)

        return redirect()
            ->route('login.show')
            ->with('feedback.message', 'Se ha cerrado la sesión correctamente.');
    }
}
