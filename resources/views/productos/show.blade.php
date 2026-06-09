<?php
/** @var \App\Models\Product $product */
?>

<x-main-layout>
    <x-slot:title>{{ $product->title }}</x-slot>

    <div class="product-detail">
        <div class="row g-4">

            {{-- Imagen --}}
            <div class="col-lg-7">
                @if ($product->img !== null && \Storage::exists($product->img))
                    <div class="product-image-container">
                        <img
                            src="{{ \Storage::url($product->img) }}"
                            alt="{{ $product->img_description }}"
                            class="product-image"
                        >
                    </div>
                @endif
            </div>

            {{-- Información --}}
            <div class="col-lg-5">
                <h1 class="mb-4">{{ $product->title }}</h1>

                <div class="product-info-card">
                    <div class="mb-4">
                        <h5>Precio</h5>
                        <p class="product-price">
                            ${{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <h5>Partida de producción</h5>
                        <p>{{ $product->release_date }}</p>
                    </div>

                    <hr>

                    <div>
                        <h4 class="mb-3">Detalles del Producto</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
