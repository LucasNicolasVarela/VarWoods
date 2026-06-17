<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // protected $table = 'blogs';
    protected $fillable = ['title', 'contenido_blog', 'resumen', 'category_name', 'fecha_publicacion', 'img', 'img_description'];
}
