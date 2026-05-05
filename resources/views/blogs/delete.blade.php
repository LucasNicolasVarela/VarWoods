<?php
/** @var \App\Models\Blog $blog */
?>

<x-main-layout>

    <x-slot:title> Eliminar blog: {{$blog->title}}</x-slot>

    <h1>Confirmación para eliminar blog</h1>

    <p>¿Estás seguro que deseas eliminar el blog: <b>{{ $blog->title }}</b>?</p>
    <p>Esta acción no se puede deshacer. Verifica antes de confirmar esta acción</p>

    <hr>

    <h2>{{ $blog->title }}</h2>
        <dl>
            <dt><b>Categoría</b></dt>
            <dd>
                {{ $blog->category_name }}
            </dd>

            <dt><b>Resumen</b></dt>
            <dd>
                {{ $blog->resumen }}
            </dd>
        </dl>

    <h3 class="mb-2">Contenido del blog</h3>
    <div>{{ $blog->contenido_blog }}</div>

    <dt><b>Fecha de Publicación</b></dt>
    <dd>
        {{ $blog->fecha_publicacion }}
    </dd>

    <hr>

    <form action="{{ route('blogs.destroy', ['id' => $blog->id]) }}" method="POST">
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

</x-main-layout>
