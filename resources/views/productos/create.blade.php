
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

    <form action="{{ route('productos.store') }}" method="POST">
        <div class="mb-2">
            <label for="title" class="form-label">Nombre del Producto</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
            >
            @error('title')
                <div class="alert alert-danger mt-2">
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
                class="form-control"
            >
            @error('price')
                <div class="alert alert-danger mt-2">
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
            class="form-control"
            >
            @error('release_date')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="description" class="form-label">Descripción</label>
            <textarea
            name="description"
            id="description"
            class="form-control"
            ></textarea>
            @error('description')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="cover" class="form-label">Imagen</label>
            <input
                type="file"
                name="cover"
                id="cover"
                class="form-control"
            >
            @error('cover')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="cover_description" class="form-label">Descripción de la Imagen</label>
            <textarea
            name="cover_description"
            id="cover_description"
            class="form-control"
            ></textarea>
            @error('cover_description')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-main-layout>
