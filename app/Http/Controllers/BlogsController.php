<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'img' => 'nullable|image|max:2048',
            'img_description' => 'nullable|string|max:255',
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

        if($request->hasFile('img')){
            $filename = $request->file('img')->store('imgs');
            $data['img'] = $filename;
        }

        $data['img_description'] = $request->img_description;


        $blog = Blog::create($data);


        return redirect()
        ->route('blogs.index')
        ->with('feedback.message', 'El blog <b>' . e($blog->title) . '</b> ha sido creado correctamente.');
    }

    public function destroy(int $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        if(isset($blog->img) && $blog->img !== null && Storage::exists($blog->img)){
            Storage::delete($blog->img);
        }

        return redirect()
            ->route('blogs.index')
            ->with(
                'feedback.message',
                'El blog <b>' . e($blog->title) . '</b> ha sido eliminado correctamente.'
            );
    }

    public function delete(int $id)
    {
        return view('blogs.delete', [
            'blog' => Blog::findOrFail($id),
        ]);
    }

    public function edit(int $id)
    {
        return view('blogs.edit', [
            'blog' => Blog::findOrFail($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'contenido_blog' => 'required|string',
            'resumen' => 'required|string|max:500',
            'category_name' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'img' => 'nullable|image|max:2048',
            'img_description' => 'nullable|string|max:255',
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
        ]);

        $data = $request->only([
            'title',
            'contenido_blog',
            'resumen',
            'category_name',
            'fecha_publicacion',
        ]);

        $data['img_description'] = $request->img_description;

        // --------------------------------------------------
        // Upload de la imagen y descripción
        // --------------------------------------------------
        if($request->hasFile('img')){
            $filename = $request->file('img')->store('imgs');
            $data['img'] = $filename;

            $oldImage = $blog->img;
        }

        $blog->update($data);
            // Si el blog tiene una imagen anterior y es diferente a la nueva, la eliminamos del almacenamiento.
        if(isset($oldImage) && $oldImage !== null && Storage::exists($oldImage)){
            Storage::delete($oldImage);
        }

        return redirect()
            ->route('blogs.index')
            ->with(
                'feedback.message',
                'El blog <b>' . e($blog->title) . '</b> ha sido actualizado correctamente.'
            );
    }
}
