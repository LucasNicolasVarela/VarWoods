<?PHP
/**
 * @var Illuminate\Support\ViewErrorBag $errors
 * @var \App\Models\Blog $blog
*/

?>

<x-main-layout>
    <x-slot:title>Editar Blog {{ $blog->title }}</x-slot:title>
    <h1 class="mb-3">Editar Blog {{ $blog->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <p>Por favor, verifique nuevamente los datos ingresados.</p>
        </div>
    @endif

    <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">

        <div class="mb-2">
            <label for="title" class="form-label">Nombre del blog</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control @error ('title') is-invalid @enderror"
                @error('title')
                    aria-invalid="true"
                    aria-errormessage="error_title"
                @enderror
                value="{{ old('title', $blog->title) }}"
            >

            @error('title')
                <div class="text-danger mb-0" id="error_title">
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
                class="form-control @error ('category_name') is-invalid @enderror"
                @error('category_name')
                    aria-invalid="true"
                    aria-errormessage="error_category_name"
                @enderror
                value="{{ old('category_name', $blog->category_name) }}"
            >

            @error('category_name')
                <div class="text-danger mb-0" id="error_category_name">
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
                class="form-control @error ('resumen') is-invalid @enderror"
                @error('resumen')
                    aria-invalid="true"
                    aria-errormessage="error_resumen"
                @enderror
                value="{{ old('resumen', $blog->resumen) }}"
            >

            @error('resumen')
                <div class="text-danger mb-0" id="error_resumen">
                    {{ $message }}
                </div>
            @endif
        </div>

        <div class="mb-2">
            <label for="contenido_blog" class="form-label">Contenido del blog</label>

            <textarea
                name="contenido_blog"
                id="contenido_blog"
                class="form-control @error ('contenido_blog') is-invalid @enderror"
                rows="5"
                @error('contenido_blog')
                    aria-invalid="true"
                    aria-errormessage="error_contenido_blog"
                @enderror
            >{{ old('contenido_blog', $blog->contenido_blog) }}</textarea>

            @error('contenido_blog')
                <div class="text-danger mb-0" id="error_contenido_blog">
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
                class="form-control @error ('fecha_publicacion') is-invalid @enderror"
                value="{{ old('fecha_publicacion', $blog->fecha_publicacion) }}"
                @error('fecha_publicacion')
                    aria-invalid="true"
                    aria-errormessage="error_fecha_publicacion"
                @enderror
            >

            @error('fecha_publicacion')
                <div class="text-danger mb-0" id="error_fecha_publicacion">
                    {{ $message }}
                </div>
            @endif
        </div>

        <div class="mb-2">
            @if ($blog->img !== null && \Storage::exists($blog->img))
                <span>Imagen actual</span>

                <div class="my-2">
                    <img
                        src="{{ \Storage::url($blog->img) }}"
                        alt="{{ $blog->img_description }}"
                        style="max-width: 300px; height: auto;"
                    >
                </div>
            @else
                <span>No se han cargado imágenes en este blog</span>
            @endif
        </div>

        <div class="mb-2">
            <label for="img" class="form-label">Imagen</label>

            <input
                type="file"
                name="img"
                id="img"
                class="form-control @error ('img') is-invalid @enderror"
                aria-describedby="help_img"
                @error('img')
                    aria-invalid="true"
                    aria-errormessage="error_img"
                @enderror
            >

            <div id="help_img">
                Si desea mantener la imagen actual, deje este campo vacío.
            </div>

            @error('img')
                <div class="text-danger mb-0" id="error_img">
                    {{ $message }}
                </div>
            @endif
        </div>

        <div class="mb-2">
            <label for="img_description" class="form-label">
                Descripción de la Imagen
            </label>

            <textarea
                name="img_description"
                id="img_description"
                class="form-control @error ('img_description') is-invalid @enderror"
                @error('img_description')
                    aria-invalid="true"
                    aria-errormessage="error_img_description"
                @enderror
            >{{ old('img_description', $blog->img_description) }}</textarea>

            @error('img_description')
                <div class="text-danger mb-0" id="error_img_description">
                    {{ $message }}
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Publicar
        </button>

    </form>
</x-main-layout>
