<?php
/* dd($products); */

/*
    Si bien no es necesario para que funcione si es buena idea documentar el documentar al comienzo de cada vista las variables que van a recibir dentro del controller
    Algunos editores pueden mejorar el autocompletar haciendo esto, ya demas es bueno para ayuda para el desarrollador.
*/
/** @var \Illuminate\Database\Eloquent\Collection|array $products */
?>


<x-main-layout>
    <x-slot:title>Catálogo de Productos</x-slot>
    <h1>Catálogo de Productos</h1>
    <p>Explora nuestra amplia selección de productos de madera de alta calidad.</p>

    <div class="mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-success">Agregar Producto</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Partida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <td> {{ $product->title }} </td>
                <td> ${{ $product->price }} </td>
                <td> {{ $product->description }} </td>
                <td> {{ $product->release_date }} </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{route('productos.show', ['id'=> $product->id]) }}" class="btn btn-primary">Detalles</a>
                        <a href="{{ route('productos.delete', ['id' => $product->id]) }}" class="btn btn-danger">Eliminar</a>
                        {{-- <form action="{{ route('productos.destroy', ['id' => $product->id]) }}" method="POST">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form> --}}
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</x-main-layout>
