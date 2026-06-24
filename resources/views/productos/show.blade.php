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
                    @if($product->promo_price)
                        <span class="product-category-badge">
                            {{ round((($product->price - $product->promo_price) / $product->price) * 100) }}% OFF
                        </span>
                    @endif
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
                        @if($product->promo_price)
                            <div class="product-prices">
                                <span class="product-old-price">
                                    ${{ number_format($product->price,0,',','.') }}
                                </span>
                                <span class="product-promo-price">
                                    ${{ number_format($product->promo_price,0,',','.') }}
                                </span>
                            </div>
                        @else
                            <p class="product-normal-price">
                                ${{ number_format($product->price,0,',','.') }}
                            </p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <h2 class="h5">
                            Tipo de madera
                        </h2>

                        @if($product->woodTypes->count())
                            <ul class="list-unstyled">
                                @foreach($product->woodTypes as $wood)
                                    <li>
                                        {{ $wood->name }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>
                                MDF
                            </p>
                        @endif
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
