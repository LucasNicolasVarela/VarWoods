<?php
/** @var \Illuminate\Database\Eloquent\Collection|array $products */
/** @var \Illuminate\Database\Eloquent\Collection|array $blogs */
?>

<x-main-layout>
    <x-slot:title>Inicio</x-slot>

    <h1>VarWoods - Los mejores muebles</h1>

    <p class="mb-5">
        Bienvenido a VarWoods, tu destino número uno para muebles de madera de alta calidad.
    </p>

    <section class="mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Nuestros productos destacados</h2>

            <a href="{{ route('productos.index') }}" class="text-decoration-none fw-semibold">
                Ver todos los productos →
            </a>
        </div>

        {{-- DESKTOP: 4 productos por slide --}}
        <div
            id="featuredProductsCarouselDesktop"
            class="carousel slide d-none d-lg-block"
            data-bs-ride="false"
        >

            <div class="carousel-inner">

                @foreach($products->chunk(4) as $index => $chunk)

                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                        <div class="row g-4">

                            @foreach($chunk as $product)

                                <div class="col-lg-3">

                                    <div class="card h-100 shadow-sm">

                                        <div class="product-card-image-wrapper">

                                            <span class="product-category-badge">
                                                {{ $product->category->name }}
                                            </span>

                                            @if($product->img !== null && \Storage::exists($product->img))
                                                <img
                                                    src="{{ \Storage::url($product->img) }}"
                                                    class="card-img-top product-card-image"
                                                    alt="{{ $product->img_description }}"
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
                                                {{ $product->title }}
                                            </h5>

                                            @if($product->promo_price)

                                                <div class="product-prices">

                                                    <span class="product-old-price">
                                                        ${{ number_format($product->price, 0, ',', '.') }}
                                                    </span>

                                                    <span class="product-promo-price">
                                                        ${{ number_format($product->promo_price, 0, ',', '.') }}
                                                    </span>

                                                </div>

                                            @else

                                                <p class="product-normal-price">
                                                    ${{ number_format($product->price, 0, ',', '.') }}
                                                </p>

                                            @endif

                                            <div class="mt-auto">

                                                <a
                                                    href="{{ route('productos.show', ['id' => $product->id]) }}"
                                                    class="btn btn-primary w-100"
                                                >
                                                    Ver producto
                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#featuredProductsCarouselDesktop"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#featuredProductsCarouselDesktop"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

        {{-- MOBILE: 2 productos por slide --}}
        <div
            id="featuredProductsCarouselMobile"
            class="carousel slide d-lg-none"
            data-bs-ride="false"
        >

            <div class="carousel-inner">

                @foreach($products->chunk(2) as $index => $chunk)

                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                        <div class="row g-3">

                            @foreach($chunk as $product)

                                <div class="col-6">

                                    <div class="card h-100 shadow-sm">

                                        <div class="product-card-image-wrapper">

                                            <span class="product-category-badge">
                                                {{ $product->category->name }}
                                            </span>

                                            @if($product->img !== null && \Storage::exists($product->img))
                                                <img
                                                    src="{{ \Storage::url($product->img) }}"
                                                    class="card-img-top product-card-image"
                                                    alt="{{ $product->img_description }}"
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

                                            <h6 class="card-title">
                                                {{ $product->title }}
                                            </h6>

                                            @if($product->promo_price)

                                                <div class="product-prices">

                                                    <span class="product-old-price">
                                                        ${{ number_format($product->price, 0, ',', '.') }}
                                                    </span>

                                                    <span class="product-promo-price">
                                                        ${{ number_format($product->promo_price, 0, ',', '.') }}
                                                    </span>

                                                </div>

                                            @else

                                                <p class="product-normal-price">
                                                    ${{ number_format($product->price, 0, ',', '.') }}
                                                </p>

                                            @endif

                                            <div class="mt-auto">

                                                <a
                                                    href="{{ route('productos.show', ['id' => $product->id]) }}"
                                                    class="btn btn-primary w-100"
                                                >
                                                    Ver producto
                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#featuredProductsCarouselMobile"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#featuredProductsCarouselMobile"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </section>

    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Últimos artículos del blog</h2>

            <a href="{{ route('blogs.index') }}" class="text-decoration-none fw-semibold">
                Ver todos los blogs →
            </a>
        </div>
        <div class="row g-4 mt-2">
            @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
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

                            <p class="text-muted">
                                {{ $blog->fecha_publicacion }}
                            </p>

                            <p class="card-text">
                                {{ Str::limit($blog->resumen, 120) }}
                            </p>

                            <div class="mt-auto">
                                <a
                                    href="{{ route('blogs.show', ['id' => $blog->id]) }}"
                                    class="btn btn-primary w-100"
                                >
                                    Ver blog
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-main-layout>
