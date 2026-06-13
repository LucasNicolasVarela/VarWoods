<?php
/** @var \App\Models\Product $product */
?>

<x-main-layout>
    <x-slot:title>
        {{ $product->title }}
    </x-slot>

    <article class="product-detail">
        <div class="row g-4">

            {{-- Imagen --}}
            <div class="col-lg-7">
                @if ($product->img && \Storage::exists($product->img))
                    <figure class="product-image-container">
                        <img
                            src="{{ \Storage::url($product->img) }}"
                            alt="{{ $product->img_description ?? $product->title }}"
                            class="product-image"
                        >
                    </figure>
                @endif
            </div>

            {{-- Información --}}
            <div class="col-lg-5">
                <section class="product-info-card">
                    <header>
                        <h1 class="mb-4">{{ $product->title }}</h1>
                    </header>

                    <div class="mb-4">
                        <h2 class="h5">Precio</h2>
                        <p class="product-price">
                            ${{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <h2 class="h5">Categoría</h2>
                        <p>{{ $product->category?->name ?? 'Sin categoría' }}</p>
                    </div>

                    <div class="mb-4">
                        <h2 class="h5">Partida de producción</h2>
                        <p>{{ $product->release_date }}</p>
                    </div>

                    <hr>

                    <div>
                        <h2 class="h4 mb-3">Detalles del producto</h2>
                        <p>{!! nl2br(e($product->description)) !!}</p>
                    </div>
                </section>
            </div>

        </div>
    </article>
</x-main-layout>
