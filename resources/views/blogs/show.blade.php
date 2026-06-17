<?php
/** @var \App\Models\Blog $blog */
?>

<x-main-layout>
    <x-slot:title>
        {{ $blog->title }}
    </x-slot>

    <article class="blog-detail">
        <div class="row g-4">

            {{-- Imagen --}}
            <div class="col-lg-7">
                @if ($blog->img && \Storage::exists($blog->img))
                    <figure class="blog-image-container">
                        <img
                            src="{{ \Storage::url($blog->img) }}"
                            alt="{{ $blog->img_description ?? $blog->title }}"
                            class="img-fluid rounded"
                        >
                    </figure>
                @endif
            </div>

            <div class="col-lg-5">
                <section class="blog-info-card">
                    <header>
                        <h1 class="mb-4">
                            {{ $blog->title }}
                        </h1>
                    </header>
                    <div class="mb-4">
                        <h2 class="h5">Categoría</h2>
                        <p>{{ $blog->category_name }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="h5">Resumen</h2>
                        <p>{{ $blog->resumen }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="h5">Fecha de publicación</h2>
                        <p>{{ $blog->fecha_publicacion }}</p>
                    </div>

                    <hr>

                    <div>
                        <h2 class="h4 mb-3">
                            Contenido del blog
                        </h2>
                        <p>
                            {!! nl2br(e($blog->contenido_blog)) !!}
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </article>
</x-main-layout>
