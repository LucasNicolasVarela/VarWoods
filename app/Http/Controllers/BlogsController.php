<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    public function index()
    {
        /* $blogs = DB::table('blogs')->get(); */
        $blogs = Blog::all();
        /*dd($blogs); */

        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function show( int $id)
    {
        $blog = Blog::findOrFail($id);  // Acordate que esto es para que si no lo encuentra es para que lance una excepcion y muestre una pagina de error 404.

        /* dd($blog); */
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }

    public function create()
    {
        return view('blogs.create');
    }



    public function store(Request $request)
    {
        //---------------------------------------//
                    /* VALIDACIONES */
        //---------------------------------------//
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'contenido_blog' => 'required|string',
            'resumen' => 'required|string|max:500',
            'category_name' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
        ],[
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe contener texto.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'contenido_blog.required' => 'El contenido del blog es obligatorio.',
            'contenido_blog.string' => 'El contenido del blog debe contener texto.',
            'resumen.required' => 'El resumen es obligatorio.',
            'resumen.string' => 'El resumen debe contener texto.',
            'resumen.max' => 'El resumen no puede tener más de 500 caracteres.',
            'category_name.required' => 'La categoría es obligatoria.',
            'category_name.string' => 'La categoría debe contener texto.',
            'category_name.max' => 'La categoría no puede tener más de 255 caracteres.',
            'fecha_publicacion.required' => 'La fecha de publicación es obligatoria.',
            'fecha_publicacion.date' => 'Introduzca una fecha válida.',
        ]
        );

        /* dd($request->all()); */

        $data = $request->only([
            'title',
            'contenido_blog',
            'resumen',
            'category_name',
            'fecha_publicacion',
        ]);

        $blog = Blog::create($data);

        return redirect()->route('blogs.index');
    }

    public function destroy(int $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index');
    }

    public function delete(int $id)
    {
        return view('blogs.delete', [
            'blog' => Blog::findOrFail($id),
        ]);
    }
}
