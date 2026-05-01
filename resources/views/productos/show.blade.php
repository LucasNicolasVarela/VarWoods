<?php
/** @var \App\Models\Product $product */
?>

<x-main-layout>
    <x-slot:title>{{$product->title}}</x-slot>
    <h1 class="mb-3">{{ $product->title }}</h1>
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
