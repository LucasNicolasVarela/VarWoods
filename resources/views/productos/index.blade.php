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

    <div class="text-center mb-5">
        <h1>Catálogo de Productos</h1>
        <h2>Explora nuestra amplia selección de productos de madera de alta calidad.</h2>
    </div>
    @auth
        @if(auth()->user()->role === 'admin')
            <div class="mb-3">
                <a href="{{ route('productos.create') }}" class="btn btn-success">
                    Agregar Producto
                </a>
            </div>
        @endif
    @endauth

    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-4 col-lg-3">

                <x-product-card :product="$product">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="d-flex gap-2">
                                <a
                                    href="{{ route('productos.edit', ['id' => $product->id]) }}"
                                    class="btn btn-warning flex-fill"
                                >
                                    Editar
                                </a>

                                <a
                                    href="{{ route('productos.delete', ['id' => $product->id]) }}"
                                    class="btn btn-danger flex-fill"
                                >
                                    Eliminar
                                </a>
                            </div>
                        @endif
                    @endauth
                </x-product-card>

            </div>
        @endforeach
    </div>
</x-main-layout>
