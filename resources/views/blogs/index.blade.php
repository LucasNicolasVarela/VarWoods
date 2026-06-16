<?php
/* dd($blogs); */
?>

<x-main-layout>
    <x-slot:title>Blogs</x-slot>
    <h1>VarWoods - Blogs</h1>
    <p>Descubre las últimas noticias y artículos sobre muebles de madera.</p>

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="mb-3">
                <a href="{{ route('blogs.create') }}" class="btn btn-success">
                    Crear Nuevo Blog
                </a>
            </div>
        @endif
    @endauth


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Contenido</th>
                <th>Resumen</th>
                <th>Fecha de Publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category_name }}</td>
                    <td>{{ $blog->contenido_blog }}</td>
                    <td>{{ $blog->resumen }}</td>
                    <td>{{ $blog->fecha_publicacion }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="btn btn-primary">Ver</a>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}" class="btn btn-warning">
                                        Editar
                                    </a>

                                    <a href="{{ route('blogs.delete', ['id' => $blog->id]) }}" class="btn btn-danger">
                                        Eliminar
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </td>
                </tr>
            @endforeach
    </table>
</x-main-layout>
