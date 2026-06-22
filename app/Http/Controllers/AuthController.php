<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe contener texto.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'name.max' => 'El nombre no puede tener más de 20 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.unique' => 'Ya existe una cuenta registrada con ese correo electrónico.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe contener texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password'],
        ]);

        return redirect()
        ->route('login.show')
        ->with('feedback.message', 'Cuenta creada correctamente.')
        ->with('feedback.type', 'success');
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
                ->with('feedback.message', 'Credenciales incorrectas, por favor intente de nuevo.')
                ->with('feedback.type', 'danger');
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
