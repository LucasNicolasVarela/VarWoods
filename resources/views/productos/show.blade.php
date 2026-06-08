<?php
/** @var \App\Models\Product $product */
?>

<x-main-layout>
    <x-slot:title>{{$product->title}}</x-slot>
    <h1 class="mb-3">{{ $product->title }}</h1>

    <div>
        {{-- Esto es algo asi como un "reflejo" de la carpeta real de storage que se encuentra en la raiz del proyecto --}}
        @if ($product->img !== null && \Storage::exists($product->img))
            <img
                src="{{ \Storage::url($product->img) }}"
                alt="{{ $product->img_description }}"
                class="img-fluid mb-3"
            >
        @endif
    </div>

    <dl class="mb-3">
        <dt><b>Precio</b></dt>
        <dd>
            ${{ $product->price }}
        </dd>

        <dt><b>Partida de producción</b></dt>
        <dd>
            {{ $product->release_date }}
        </dd>
    </dl>

    <hr class="mb-3">
        <h2 class="mb-2">Detalles del Producto</h2>
        <div>{{ $product->description }}</div>
</x-main-layout>
