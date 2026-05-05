
<?PHP
/**
 * @var Illuminate\Support\ViewErrorBag $errors
*/

?>

<x-main-layout>
    <x-slot:title>Publicar Blog</x-slot>
    <h1 class="mb-3">Publicar un nuevo Blog</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
                <p>Por favor, verifique nuevamente los datos ingresados.</p>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST">
        <div class="mb-2">
            <label for="title" class="form-label">Nombre del blog</label>
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
            <label for="category_name" class="form-label">Categoría</label>
            <input
                type="text"
                name="category_name"
                id="category_name"
                class="form-control"
            >
            @error('category_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="resumen" class="form-label">Resumen</label>
            <input
                type="text"
                name="resumen"
                id="resumen"
                class="form-control"
            >
            @error('resumen')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="contenido_blog" class="form-label">Contenido del blog</label>
            <textarea
                name="contenido_blog"
                id="contenido_blog"
                class="form-control"
                rows="5"
            ></textarea>
            @error('contenido_blog')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
            <input
                type="date"
                name="fecha_publicacion"
                id="fecha_publicacion"
                class="form-control"
            >
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-main-layout>
