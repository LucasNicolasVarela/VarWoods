<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }} :: VarWoods</title>
    <link rel="stylesheet" href=" <?= url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href=" <?= url('css/style.css'); ?>">
</head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= route('home'); ?>">VarWoods</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <x-nav-link to="home">Home</x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link to="about">Sobre Nosotros</x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link to="productos.index">Productos</x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link to="blogs.index">Blogs</x-nav-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="container py-2">
                {{$slot}}
            </main>
            <footer class="footer">
                <p>VarWoods&copy; 2026 Todos los derechos reservados.</p>
            </footer>
        </div>
        <script src=" <?= url('js/bootstrap.bundle.min.js'); ?>"></script>
    </body>
</html>

