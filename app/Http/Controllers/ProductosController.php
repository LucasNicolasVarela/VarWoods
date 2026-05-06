<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
{
    public function index()
    {
        // Acá traemos los productos de la base de datos y se los pasamos a la vista para que los muestre.
        /* $products = DB::table('product')->get(); */ // El método get() nos devuelve una colección con los resultados de la consulta.
        /* dd($products); */ // El método dd() nos muestra el contenido de la variable y detiene la ejecución del programa.

        $products = Product::all(); // El método all() nos devuelve una colección con todos los registros de la tabla product.
        /* dd($products); */ // El método dd() nos muestra el contenido de la variable y detiene la ejecución del programa.


        // El método view() nos permite renderizar una vista. Recibe dos parámetros: el nombre de la vista y un array con los datos que queremos pasarle a la vista.
        return view('productos.index', [
            'products' => $products,
        ]);
    }

    public function show(int $id){
        /*  echo "Mostrando el producto con id: $id"; */
        /* dd($product); */ // El método dd() nos muestra el contenido de la variable y detiene la ejecución del programa.
        /* die; */
        // El método find() nos devuelve el registro con el id especificado o null si no lo encuentra.
        //findOrFail nos devuelve el registro con el id especificado o lanza una excepción si no lo encuentra. Es necesario por que si llega solo con Null a la vista va a tirar un error al intentar acceder a las propiedades del producto.

        $product = Product::findOrFail($id);



        return view('productos.show', [
            'product' => $product,
        ]);
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        //---------------------------------------//
                    /* VALIDACIONES */
        //---------------------------------------//
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'release_date' => 'required|date',
        ],[
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe contener texto.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe contener texto.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio no puede ser negativo.',
            'release_date.required' => 'La fecha de lanzamiento es obligatoria.',
            'release_date.date' => 'Introduzca una fecha válida.',
        ]);


        /* dd($request); */   /* ----> probamos como llegan los datos */
        /* $data = $request->except(['cover', 'cover_description']); */ /* except() nos devuelve un array con todos los datos excepto los que le pasamos como parámetro. */

        /* $data = $request->only(['title', 'description', 'price', 'release_date']); */ /* only() nos devuelve un array con solo los datos que le pasamos como parámetro. */   /* ----> comentado por que la validacion ya lo hace antes */
        /* dd($data); */


        // --------------------------------------------------
            /* Forma 1 de insertar productos en la BD */
        // --------------------------------------------------
        /* $product = new Product(); // Creamos una nueva instancia del modelo Product.
        $product->title = $data['title']; // Asignamos el valor del título al atributo title del modelo.
        $product->price = $data['price']; // Asignamos el valor del precio al atributo price del modelo.
        $product->release_date = $data['release_date']; // Asignamos el valor de la fecha de lanzamiento al atributo release_date del modelo.
        $product->description = $data['description']; // Asignamos el valor de la descripción al atributo description del modelo.
        $product->save(); // Guardamos el producto en la base de datos.  */

        // --------------------------------------------------
            /* Forma 2 de insertar productos en la BD */
        // --------------------------------------------------
        $product = Product::create($data);



        // IMPORTANTE: toda pantalla que reciba datos por POST, después de procesarlos, debe redirigir a otra pantalla para evitar que si el usuario refresca la página, se vuelva a enviar el formulario y se dupliquen los datos en la base de datos. Para redirigir a otra pantalla, podemos usar el método redirect().
        return redirect()
        ->route('productos.index') /* Redirigimos a la pantalla de listado*/
        ->with('feedback.message', 'El producto <b>' . e($product->title) . '</b> ha sido creado correctamente.');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
        ->route('productos.index')
        ->with('feedback.message', 'El producto <b>' . e($product->title) . '</b> ha sido eliminado correctamente.');
    }

    public function delete(int $id)
    {
        return view('productos.delete', [
            'product' => Product::findOrFail($id),
        ]);
    }

    public function edit(int $id)
    {
        return view('productos.edit', [
            'product' => Product::findOrFail($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'release_date' => 'required|date',
        ],[
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe contener texto.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe contener texto.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio no puede ser negativo.',
            'release_date.required' => 'La fecha de lanzamiento es obligatoria.',
            'release_date.date' => 'Introduzca una fecha válida.',
        ]);

        $data = $request->only([
            'title',
            'description',
            'price',
            'release_date',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);
        return redirect()
        ->route('productos.index')
        ->with('feedback.message', 'El producto <b>' . e($product->title) . '</b> ha sido actualizado correctamente.');
    }
}
