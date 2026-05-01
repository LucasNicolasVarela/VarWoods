<?php
/* dd($blogs); */
?>

<x-main-layout>
    <x-slot:title>Blogs</x-slot>
    <h1>VarWoods - Blogs</h1>
    <p>Descubre las últimas noticias y artículos sobre muebles de madera.</p>

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
                        <a href="{{ url('/blogs/' . $blog->id)}}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
            @endforeach
    </table>
</x-main-layout>
