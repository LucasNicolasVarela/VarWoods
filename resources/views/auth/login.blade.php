<x-main-layout>
    <x-slot:title>Iniciar Sesión</x-slot:title>

    <h1>Iniciar Sesión</h1>

    <form action="{{ route('login.process') }}" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>

    <p class="mt-3">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}">Crear cuenta</a>
    </p>
</x-main-layout>
