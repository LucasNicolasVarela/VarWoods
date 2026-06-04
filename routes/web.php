<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('sobre-nosotros', [\App\Http\Controllers\HomeController::class, 'about'])
->name('about');


/*------------------------------------------------
    Rutas para el login / autenticacion y logout
--------------------------------------------------*/
Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'show'])
    ->name('login.show');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'process'])
    ->name('login.process');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

/*-----------------------------
    Rutas para el blog
-----------------------------*/

Route::get('blogs/listado', [\App\Http\Controllers\BlogsController::class, 'index'])
    ->name('blogs.index');

Route::get('blogs/{id}', [\App\Http\Controllers\BlogsController::class, 'show'])
    ->whereNumber('id')
    ->name('blogs.show');

Route::get('/blog/nuevo', [\App\Http\Controllers\BlogsController::class, 'create'])
    ->name('blogs.create')
    ->middleware('auth'); // Esto es para proteger la ruta y que solo los usuarios autenticados puedan acceder a ella. Lo vamos a agregar en todas las que requieran un permiso de autenticación, como la de editar y eliminar

Route::post('/blog/nuevo', [\App\Http\Controllers\BlogsController::class, 'store'])  // METODO "store" traducido de "almacenar" o "guardar"
    ->name('blogs.store')
    ->middleware('auth');

Route::post('/blog/{id}/eliminar', [\App\Http\Controllers\BlogsController::class, 'destroy'])
    ->whereNumber('id')
    ->name('blogs.destroy')
    ->middleware('auth');

Route::get('/blog/{id}/eliminar', [\App\Http\Controllers\BlogsController::class, 'delete'])
    ->name('blogs.delete')
    ->middleware('auth');

Route::get('/blog/{id}/editar', [\App\Http\Controllers\BlogsController::class, 'edit'])
    ->name('blogs.edit')
    ->middleware('auth');

Route::post('/blog/{id}/editar', [\App\Http\Controllers\BlogsController::class, 'update'])
    ->name('blogs.update')
    ->middleware('auth');

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
    ->name('productos.create')
    ->middleware('auth');

// Para la creacion de una ruta de insercion vamos a crear una ruta con la misma URL que la del formulario pero que en vez de GET  utilice POST
Route::post('productos/nuevo', [\App\Http\Controllers\ProductosController::class, 'store'])
    ->name('productos.store')
    ->middleware('auth');

Route::post('productos/{id}/eliminar', [\App\Http\Controllers\ProductosController::class, 'destroy'])
    ->whereNumber('id')
    ->name('productos.destroy')
    ->middleware('auth');

Route::get('/productos/{id}/eliminar', [\App\Http\Controllers\ProductosController::class, 'delete'])
    ->name('productos.delete')
    ->middleware('auth');

Route::get('/productos/{id}/editar', [\App\Http\Controllers\ProductosController::class, 'edit'])
    ->name('productos.edit')
    ->middleware('auth');

Route::post('/productos/{id}/editar', [\App\Http\Controllers\ProductosController::class, 'update'])
    ->name('productos.update')
    ->middleware('auth');

// -------------------------------------------------------------------------------------------//
    /* Si entra por GET vamso al formulario, si entra por POST vamos a intentar de grabar */
// -------------------------------------------------------------------------------------------//
