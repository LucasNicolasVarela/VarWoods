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
/*         dd($blogs); */

        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function show( int $id)
    {
        $blog = Blog::findOrFail($id);

        /* dd($blog); */
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }
}
