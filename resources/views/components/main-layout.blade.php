<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }} :: VarWoods</title>

    <link rel="icon" href="{{ asset('favicon-varwoods.png') }}" type="image/png">

    <link rel="stylesheet" href=" <?= url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href=" <?= url('css/style.css'); ?>">
</head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
                <div class="container-fluid">
                    {{-- Logo --}}
                    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
                        <img src="{{ asset('favicon-varwoods.png') }}"
                            alt="Logo VarWoods"
                            width="32"
                            height="32">
                        <span>VarWoods</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                            {{-- HOME CON SVG --}}
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link nav-icon-link">
                                    <svg class="nav-icon home-icon"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 48 48">
                                        <path d="M 23.951172 4 A 1.50015 1.50015 0 0 0 23.072266 4.3222656 L 8.859375 15.519531 C 7.0554772 16.941163 6 19.113506 6 21.410156 L 6 40.5 C 6 41.863594 7.1364058 43 8.5 43 L 18.5 43 C 19.863594 43 21 41.863594 21 40.5 L 21 30.5 C 21 30.204955 21.204955 30 21.5 30 L 26.5 30 C 26.795045 30 27 30.204955 27 30.5 L 27 40.5 C 27 41.863594 28.136406 43 29.5 43 L 39.5 43 C 40.863594 43 42 41.863594 42 40.5 L 42 21.410156 C 42 19.113506 40.944523 16.941163 39.140625 15.519531 L 24.927734 4.3222656 A 1.50015 1.50015 0 0 0 23.951172 4 z"></path>
                                    </svg>
                                </a>
                            </li>
                            {{--  <li class="nav-item">
                                <x-nav-link to="productos.index">Productos</x-nav-link>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <x-nav-link to="blogs.index">Blogs</x-nav-link>
                            </li> --}}
                            @auth
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="nav-link btn btn-link d-flex align-items-center gap-2 user-btn">
                                            {{-- AVATAR VERDE --}}
                                            <svg class="nav-icon user-icon logged"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 37 37">
                                                <path d="M18.5 17.4722C19.9229 17.4722 21.3139 17.0503 22.497 16.2597C23.6801 15.4692 24.6023 14.3456 25.1468 13.031C25.6913 11.7164 25.8338 10.2698 25.5562 8.87421C25.2786 7.47862 24.5934 6.1967 23.5872 5.19054C22.5811 4.18437 21.2991 3.49917 19.9036 3.22157C18.508 2.94397 17.0614 3.08645 15.7468 3.63098C14.4322 4.17551 13.3086 5.09764 12.518 6.28076C11.7275 7.46388 11.3055 8.85485 11.3055 10.2778C11.3055 12.1859 12.0635 14.0158 13.4127 15.365C14.762 16.7142 16.5919 17.4722 18.5 17.4722Z"></path>
                                                <path d="M31.3164 25.0469C29.6682 23.3049 27.682 21.9173 25.4792 20.9689C23.2764 20.0206 20.9034 19.5315 18.5052 19.5315C16.1069 19.5315 13.7339 20.0206 11.5311 20.9689C9.32837 21.9173 7.34216 23.3049 5.69392 25.0469C5.33657 25.4286 5.13811 25.9321 5.13892 26.455V31.8611C5.13892 32.4063 5.35549 32.9291 5.74098 33.3146C6.12647 33.7001 6.64931 33.9167 7.19447 33.9167H29.8056C30.3508 33.9167 30.8736 33.7001 31.2591 33.3146C31.6446 32.9291 31.8611 32.4063 31.8611 31.8611V26.455C31.8647 25.9335 31.67 25.4302 31.3164 25.0469Z"></path>
                                            </svg>
                                            <span>
                                                {{ auth()->user()->name }} (Cerrar sesión)
                                            </span>
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login.show') }}"
                                        class="nav-link d-flex align-items-center gap-2">
                                        {{-- AVATAR NORMAL --}}
                                        <svg class="nav-icon user-icon"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 37 37">
                                            <path d="M18.5 17.4722C19.9229 17.4722 21.3139 17.0503 22.497 16.2597C23.6801 15.4692 24.6023 14.3456 25.1468 13.031C25.6913 11.7164 25.8338 10.2698 25.5562 8.87421C25.2786 7.47862 24.5934 6.1967 23.5872 5.19054C22.5811 4.18437 21.2991 3.49917 19.9036 3.22157C18.508 2.94397 17.0614 3.08645 15.7468 3.63098C14.4322 4.17551 13.3086 5.09764 12.518 6.28076C11.7275 7.46388 11.3055 8.85485 11.3055 10.2778C11.3055 12.1859 12.0635 14.0158 13.4127 15.365C14.762 16.7142 16.5919 17.4722 18.5 17.4722Z"></path>
                                            <path d="M31.3164 25.0469C29.6682 23.3049 27.682 21.9173 25.4792 20.9689C23.2764 20.0206 20.9034 19.5315 18.5052 19.5315C16.1069 19.5315 13.7339 20.0206 11.5311 20.9689C9.32837 21.9173 7.34216 23.3049 5.69392 25.0469C5.33657 25.4286 5.13811 25.9321 5.13892 26.455V31.8611C5.13892 32.4063 5.35549 32.9291 5.74098 33.3146C6.12647 33.7001 6.64931 33.9167 7.19447 33.9167H29.8056C30.3508 33.9167 30.8736 33.7001 31.2591 33.3146C31.6446 32.9291 31.8611 32.4063 31.8611 31.8611V26.455C31.8647 25.9335 31.67 25.4302 31.3164 25.0469Z"></path>
                                        </svg>
                                        {{-- <span>Iniciar sesión</span> --}}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="container-fluid py-2">

                {{-- Se agrega el contenido flasheado si este existe --}}
                @if (session()->has('feedback.message'))
                        <div class="alert alert-{{ session()->get('feedback.type', 'success') }}">
                            {!! session()->get('feedback.message') !!}
                        </div>
                @endif

                {{-- Se agrega el contenido del slot --}}
                {{$slot}}
            </main>
            <footer class="footer">
                <div class="footer-container">
                    <section class="footer-column">

                        <a href="{{ route('home') }}">
                            <img
                                src="{{ asset('storage/imgs/logo-footer.png') }}"
                                alt="Logo VarWoods"
                                class="footer-logo"
                            >
                        </a>
                        <p class="footer-brand-text">
                            Diseño y calidad para cada espacio.
                        </p>


                    </section>

                    <section class="footer-column">
                        <h2 class="footer-title h4">QUIÉNES SOMOS</h2>
                        <ul class="footer-links">
                            <li>
                                <a href="{{ route('about') }}">
                                    Sobre Nosotros
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blogs.index') }}">Nuestros blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('productos.index') }}">Nuestros Productos</a>
                            </li>
                        </ul>
                    </section>

                    <section class="footer-column">
                        <h2 class="footer-title h4">PREGUNTAS FRECUENTES</h2>
                        <ul class="footer-links">
                            <li><a href="#">Métodos de pago y envío</a></li>
                            <li><a href="#">Cambios y devoluciones</a></li>
                            <li><a href="#">Términos y condiciones</a></li>
                        </ul>
                    </section>

                    <section class="footer-column">
                        <h2 class="footer-title h4">CONTACTO</h2>
                        <address class="mb-0">
                            <ul class="footer-links">
                                <li><a href="#">Whatsapp</a></li>
                                <li><a href="#">Local</a></li>
                                <li><a href="#">Dirección</a></li>
                                <li><a href="#">Email</a></li>
                            </ul>
                        </address>
                    </section>
                </div>

                <div class="footer-bottom">
                    <p>
                        VarWoods &copy; {{ date('Y') }} Todos los derechos reservados.
                    </p>
                </div>
            </footer>
        </div>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>

