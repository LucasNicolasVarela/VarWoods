<?php
/** @var \Illuminate\Database\Eloquent\Collection|array $blogs */
?>

<x-main-layout>
    <x-slot:title>Blogs</x-slot>

    <h1>VarWoods - Blogs</h1>
    <p>Descubre las últimas noticias y artículos sobre muebles de madera.</p>

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="mb-3">
                <a href="{{ route('blogs.create') }}" class="btn btn-success">
                    Crear Nuevo Blog
                </a>
            </div>
        @endif
    @endauth

    <div class="row g-4">
        @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">

                    {{-- Imagen --}}
                    <div class="product-card-image-wrapper">
                        <span class="product-category-badge">
                            {{ $blog->category_name }}
                        </span>
                        @if($blog->img !== null && \Storage::exists($blog->img))
                            <img
                                src="{{ \Storage::url($blog->img) }}"
                                class="card-img-top product-card-image"
                                alt="{{ $blog->img_description }}"
                            >
                        @else
                            <img
                                src="https://placehold.co/600x400?text=Sin+Imagen"
                                class="card-img-top product-card-image"
                                alt="Sin imagen"
                            >
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title">
                            {{ $blog->title }}
                        </h5>
                        <p class="text-muted mb-2">
                            {{ $blog->fecha_publicacion }}
                        </p>
                        <p class="card-text">
                            {{ Str::limit($blog->resumen, 120) }}
                        </p>

                        <div class="mt-auto">
                            <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="btn btn-primary w-100 mb-2"> Ver Blog </a>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}" class="btn btn-warning flex-fill"> Editar</a>
                                        <a href="{{ route('blogs.delete', ['id' => $blog->id]) }}" class="btn btn-danger flex-fill"> Eliminar </a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-main-layout>
