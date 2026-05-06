<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('sobre-nosotros', [\App\Http\Controllers\HomeController::class, 'about'])
->name('about');


/*-----------------------------
    Rutas para el blog
-----------------------------*/

Route::get('blogs/listado', [\App\Http\Controllers\BlogsController::class, 'index'])
    ->name('blogs.index');

Route::get('blogs/{id}', [\App\Http\Controllers\BlogsController::class, 'show'])
    ->whereNumber('id')
    ->name('blogs.show');

Route::get('/blog/nuevo', [\App\Http\Controllers\BlogsController::class, 'create'])
    ->name('blogs.create');

Route::post('/blog/nuevo', [\App\Http\Controllers\BlogsController::class, 'store'])  // METODO "store" traducido de "almacenar" o "guardar"
    ->name('blogs.store');

Route::post('/blog/{id}/eliminar', [\App\Http\Controllers\BlogsController::class, 'destroy'])
    ->whereNumber('id')
    ->name('blogs.destroy');

Route::get('/blog/{id}/eliminar', [\App\Http\Controllers\BlogsController::class, 'delete'])
    ->name('blogs.delete');

Route::get('/blog/{id}/editar', [\App\Http\Controllers\BlogsController::class, 'edit'])
    ->name('blogs.edit');

Route::post('/blog/{id}/editar', [\App\Http\Controllers\BlogsController::class, 'update'])
    ->name('blogs.update');

/*----------------------------
    Rutas para el producto
-----------------------------*/

Route::get('productos/catalogo', [\App\Http\Controllers\ProductosController::class, 'index'])
    ->name('productos.index');

Route::get('productos/{id}', [\App\Http\Controllers\ProductosController::class, 'show'])
    ->whereNumber('id')
    ->name('productos.show');
// Le damos un nombre a la ruta para poder referenciarla desde la vista. Esto es útil para evitar hardcodear las URLs en la vista y poder cambiar la URL de la ruta sin tener que cambiarla en la vista.
// Si usamos el método whereNumber en lugar de where para validar el parámetro id, Laravel va a convertir el valor del parámetro a un número entero antes de pasarlo al método show. Esto es útil para evitar errores si el usuario ingresa un valor no numérico en la URL. Si el valor no se puede convertir a un número entero, Laravel va a lanzar una excepción y mostrar una página de error 404.

Route::get('productos/nuevo', [\App\Http\Controllers\ProductosController::class, 'create'])
    ->name('productos.create');

// Para la creacion de una ruta de insercion vamos a crear una ruta con la misma URL que la del formulario pero que en vez de GET  utilice POST
Route::post('productos/nuevo', [\App\Http\Controllers\ProductosController::class, 'store'])
    ->name('productos.store');

Route::post('productos/{id}/eliminar', [\App\Http\Controllers\ProductosController::class, 'destroy'])
    ->whereNumber('id')
    ->name('productos.destroy');

Route::get('/productos/{id}/eliminar', [\App\Http\Controllers\ProductosController::class, 'delete'])
    ->name('productos.delete');

Route::get('/productos/{id}/editar', [\App\Http\Controllers\ProductosController::class, 'edit'])
    ->name('productos.edit');

Route::post('/productos/{id}/editar', [\App\Http\Controllers\ProductosController::class, 'update'])
    ->name('productos.update');

// -------------------------------------------------------------------------------------------//
    /* Si entra por GET vamso al formulario, si entra por POST vamos a intentar de grabar */
// -------------------------------------------------------------------------------------------//
