<?php
/** @var \App\Models\Product $product */
?>

<x-main-layout>

    <x-slot:title> Eliminar producto: {{$product->title}}</x-slot>

    <h1>Confirmación para eliminar producto</h1>

    <p>¿Estás seguro que deseas eliminar el producto: <b>{{ $product->title }}</b>?</p>
    <p>Esta acción no se puede deshacer. Verifica antes de confirmar esta acción</p>

    <hr>

    <h2>{{ $product->title }}</h2>
        <dl>
            <dt><b>Precio</b></dt>
            <dd>
                ${{ $product->price }}
            </dd>

            <dt><b>Partida de producción</b></dt>
            <dd>
                {{ $product->release_date }}
            </dd>
        </dl>

    <h3 class="mb-2">Detalles del Producto</h3>
    <div>{{ $product->description }}</div>


    <hr>

    <form action="{{ route('productos.destroy', ['id' => $product->id]) }}" method="POST">
        <button type="submit" class="btn btn-danger">Eliminar producto</button>
    </form>

</x-main-layout>
