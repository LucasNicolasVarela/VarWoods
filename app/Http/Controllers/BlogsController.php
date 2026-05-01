<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')->get();
        /* dd($blogs); */
        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }
}
