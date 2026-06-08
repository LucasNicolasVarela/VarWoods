
<?PHP
/**
 * @var Illuminate\Support\ViewErrorBag $errors
*/

/* ----------
    NOTAS
-------------*/
/* En todas las vistas de laravel, la variable $errors está disponible de forma global. Esta variable es una instancia de Illuminate\Support\ViewErrorBag y contiene los errores que hayan ocurrido en la ejecución anterior. Si no hay errores, esta variable estará vacía. */

?>

<x-main-layout>
    <x-slot:title>Publicar Producto</x-slot>
    <h1 class="mb-3">Publicar un nuevo Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
                <p>Por favor, verifique nuevamente los datos ingresados.</p>
        </div>
    @endif


    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        <div class="mb-2">
            <label for="title" class="form-label">Nombre del Producto</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control @error ('title') is-invalid @enderror"
                @error('title')
                    aria-invalid="true"
                    aria-errormessage="error_title"
                @enderror
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="text-danger mb-0" id="error_title">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="price" class="form-label">Precio</label>
            <input
                type="number"
                name="price"
                id="price"
                class="form-control @error ('price') is-invalid @enderror"
                step="0.01"
                @error('price')
                    aria-invalid="true"
                    aria-errormessage="error_price"
                @enderror
                value="{{ old('price') }}"
            >
            @error('price')
                <div class="text-danger mb-0" id="error_price">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="release_date" class="form-label">Partida de Producción</label>
            <input
            type="date"
            name="release_date"
            id="release_date"
            class="form-control @error ('release_date') is-invalid @enderror"
            @error('release_date')
                aria-invalid="true"
                aria-errormessage="error_release_date"
            @enderror
            value="{{ old('release_date') }}"
            >
            @error('release_date')
                <div class="text-danger mb-0" id="error_release_date">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="description" class="form-label">Descripción</label>
            <textarea
            name="description"
            id="description"
            class="form-control @error ('description') is-invalid @enderror"
            @error('description')
                aria-invalid="true"
                aria-errormessage="error_description"
            @enderror
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger mb-0" id="error_description">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="img" class="form-label">Imagen</label>
            <input
                type="file"
                name="img"
                id="img"
                class="form-control @error ('img') is-invalid @enderror"
                @error('img')
                    aria-invalid="true"
                    aria-errormessage="error_img"
                @enderror
            >
            @error('img')
                <div class="text-danger mb-0" id="error_img">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="img_description" class="form-label">Descripción de la Imagen</label>
            <textarea
            name="img_description"
            id="img_description"
            class="form-control @error ('img_description') is-invalid @enderror"
            @error('img_description')
                aria-invalid="true"
                aria-errormessage="error_img_description"
            @enderror
            >{{ old('img_description') }}</textarea>
            @error('img_description')
                <div class="text-danger mb-0" id="error_img_description">
                    {{ $message }}
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-main-layout>
