<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Blog;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::with(['category', 'woodTypes'])
            ->take(12)
            ->get();

        $blogs = Blog::take(3)
            ->get();

        return view('welcome', [
            'products' => $products,
            'blogs' => $blogs,
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
