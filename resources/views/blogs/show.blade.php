<x-main-layout>
    <x-slot:title>{{$blog->title}}</x-slot>
    <h1 class="mb-3">{{ $blog->title }}</h1>
    <dl class="mb-3">
        <dt><b>Categoría</b></dt>
        <dd>
            {{ $blog->category_name }}
        </dd>

        <dt><b>Resumen</b></dt>
        <dd>
            {{ $blog->resumen }}
        </dd>
    </dl>

    <hr class="mb-3">
        <h2 class="mb-2">Contenido del blog</h2>
        <div>{{ $blog->contenido_blog }}</div>

    <dt><b>Fecha de Publicación</b></dt>
        <dd>
            {{ $blog->fecha_publicacion }}
        </dd>
</x-main-layout>
