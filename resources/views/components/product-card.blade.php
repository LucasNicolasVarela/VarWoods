@props(['product'])

<div class="card h-100 shadow-sm">
    <div class="product-card-image-wrapper">
        @if($product->promo_price)
            <span class="product-category-badge">
                {{ round((($product->price - $product->promo_price) / $product->price) * 100) }}% OFF
            </span>
        @endif
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
        <h3 class="card-title">
            {{ $product->title }}
        </h3>
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

{{--         <p class="product-wood-type">
            Madera:
            @if($product->woodTypes->isEmpty())
                Melamina
            @else
                {{ $product->woodTypes->pluck('name')->implode(', ') }}
            @endif
        </p>
        <p class="card-text text-muted">
            {{ Str::limit($product->description, 80) }}
        </p> --}}

        <div class="mt-auto">
            <a
                href="{{ route('productos.show', ['id' => $product->id]) }}"
                class="btn btn-primary w-100 mb-2"
            >
                Ver producto
            </a>
            {{ $slot }}
        </div>
    </div>
</div>
