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
        ]);

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
}
