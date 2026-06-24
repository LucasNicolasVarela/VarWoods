<?php
/**
 * @var Illuminate\Support\ViewErrorBag $errors
 */
?>

<x-main-layout>
    <x-slot:title>Crear Cuenta</x-slot:title>
    <div class="container py-2">
        <h1>Crear Cuenta</h1>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <p>Por favor, verifique nuevamente los datos ingresados.</p>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    @error('name')
                        aria-invalid="true"
                        aria-errormessage="error_name"
                    @enderror
                >
                @error('name')
                    <div class="text-danger" id="error_name">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    @error('email')
                        aria-invalid="true"
                        aria-errormessage="error_email"
                    @enderror
                >
                @error('email')
                    <div class="text-danger" id="error_email">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    @error('password')
                        aria-invalid="true"
                        aria-errormessage="error_password"
                    @enderror
                >
                @error('password')
                    <div class="text-danger" id="error_password">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Confirmar Contraseña
                </label>
                <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                >
            </div>
            <button type="submit" class="btn btn-primary">
                Crear Cuenta
            </button>
        </form>

        <p class="mt-3">
            ¿Ya tienes cuenta?
            <a href="{{ route('login.show') }}">Iniciar sesión</a>
        </p>
    </div>
</x-main-layout>
