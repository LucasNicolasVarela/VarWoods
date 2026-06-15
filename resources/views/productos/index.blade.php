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

    @auth
        <div class="mb-3">
            <a href="{{ route('productos.create') }}" class="btn btn-success">Agregar Producto</a>
        </div>
    @endauth

    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">

                    {{-- tarjetas con imagenes --}}
                    @if($product->img !== null && \Storage::exists($product->img))
                        <img
                            src="{{ \Storage::url($product->img) }}"
                            class="card-img-top"
                            alt="{{ $product->img_description }}"
                            style="height: 220px; object-fit: cover;"
                        >
                    @else
                        <img
                            src="https://placehold.co/600x400?text=Sin+Imagen"
                            class="card-img-top"
                            alt="Sin imagen"
                            style="height: 220px; object-fit: cover;"
                        >
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            {{ $product->title }}
                        </h5>

                        <p class="card-text text-success fw-bold fs-5">
                            ${{ $product->price }}
                        </p>

                        <p class="card-text text-muted fw-bold fs-5">
                            {{ $product->category->name }}
                        </p>

                        @if($product->woodTypes->isEmpty())
                            <p class="card-text text-muted fw-bold fs-5">
                                Melamina
                            </p>
                        @else
                            @foreach($product->woodTypes as $woodType)
                                <p class="card-text text-muted fw-bold fs-5">
                                    {{ $woodType->name }}
                                </p>
                            @endforeach
                        @endif

                        <p class="card-text text-muted">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <div class="mt-auto">
                            <a
                                href="{{ route('productos.show', ['id' => $product->id]) }}"
                                class="btn btn-primary w-100 mb-2"
                            >
                                Ver producto
                            </a>

                            @auth
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
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-main-layout>
