<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\WoodType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function index()
    {
        // Acá traemos los productos de la base de datos y se los pasamos a la vista para que los muestre.
        /* $products = DB::table('product')->get(); */ // El método get() nos devuelve una colección con los resultados de la consulta.
        /* dd($products); */ // El método dd() nos muestra el contenido de la variable y detiene la ejecución del programa.
        //El método with() nos permite cargar las relaciones de Eloquent para evitar consultas innecesarias a la base de datos. El profe lo llama como "carga ansiosa o anticipada" sería el caso contrario a lazyload
        $products = Product::with('category', 'woodTypes')->get(); // Cargamos también la categoría y los tipos de madera para evitar consultas innecesarias.

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

        $product = Product::with('category')->findOrFail($id);

        return view('productos.show', [
            'product' => $product,
        ]);
    }

    public function create(){
        return view('productos.create', [
            'categories' => Categories::all(),
            'woodtypes' => WoodType::all(),
        ]);
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
            'category_fk' => 'required|exists:categories,category_id',
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
            'category_fk.required' => 'La categoría es obligatoria.',
            'category_fk.exists' => 'La categoría seleccionada no es válida.',
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

        // --------------------------------------------------
            /* Upload de la imagen y descripcion */
        // --------------------------------------------------
        if($request->hasFile('img')){
            $filename = $request->file('img')->store('imgs');
            $data['img'] = $filename;
        }

        $data['img_description'] = $request->img_description;

        // --------------------------------------------------


        $product = Product::create($data);


        // --------------------------------------------------
        //    Agregar datos relacionados con la tabla pivot
        //---------------------------------------------------

        // El método attach() nos permite agregar registros a la tabla pivot. Recibe como parámetro un array con los ids de los tipos de madera seleccionados en el formulario.

        $product->woodTypes()->attach($request->input('woodtypes', [])); // El segundo parámetro del método input() es un valor por defecto que se devuelve si no se encuentra el campo en la solicitud. En este caso, si no se selecciona ningún tipo de madera, se devuelve un array vacío para evitar errores al intentar agregar registros a la tabla pivot con un valor nulo.

        //---------------------------------------------------



        // IMPORTANTE: toda pantalla que reciba datos por POST, después de procesarlos, debe redirigir a otra pantalla para evitar que si el usuario refresca la página, se vuelva a enviar el formulario y se dupliquen los datos en la base de datos. Para redirigir a otra pantalla, podemos usar el método redirect().
        return redirect()
        ->route('productos.index') /* Redirigimos a la pantalla de listado*/
        ->with('feedback.message', 'El producto <b>' . e($product->title) . '</b> ha sido creado correctamente.');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        // Paso donde eliminamos primero los registros de la tabla pivot relacionada
        // En casos de relaciones de muchos a muchos contamos con el método detach() que nos permite eliminar los registros de la tabla pivot relacionados con el producto que estamos eliminando. Recibe como parámetro un array con los ids de los tipos de madera relacionados con el producto.

        $product->woodTypes()->detach(); // Si no le pasamos ningún parámetro, el método detach() elimina todos los registros relacionados con el producto en la tabla pivot.

        //---------------------------------------------------


        $product->delete();

        // Si el producto tiene una imagen asociada, la eliminamos del almacenamiento cuando se elimina el producto.
        if(isset($product->img) && $product->img !== null && Storage::exists($product->img)){
            Storage::delete($product->img);
        }

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
            'categories' => Categories::all(),
            'woodtypes' => WoodType::orderBy('name')->get(),
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
            'category_fk' => 'required|exists:categories,category_id',
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
            'category_fk.required' => 'La categoría es obligatoria.',
            'category_fk.exists' => 'La categoría seleccionada no es válida.',
        ]);



        // ---------------------------------------------------------------------------
            /* Actualizar egistros de la tabla pivot en cuanto a tipos de maderas */
        // ---------------------------------------------------------------------------
        // Cuado solicitamos editar vamos a recibir un array de id que son los que usuario pide que queden como relacion.
        // El metodo sync() nos permite sincronizar los registros en la tabla en todos los escenarios posibles

        $product->woodTypes()->sync($request->input('woodtypes', []));



        $data['img_description'] = $request->img_description;

        // --------------------------------------------------
            /* Upload de la imagen y descripcion */
        // --------------------------------------------------
        if($request->hasFile('img')){
            $filename = $request->file('img')->store('imgs');
            $data['img'] = $filename;
            $oldImage = $product->img; // Guardamos el nombre de la imagen antigua para eliminarla después de actualizar el producto.
        }

        $product->update($data); // El siguiente paso es actualizar el producto en la base de datos con la nueva imagen

        if(isset($oldImage) && $oldImage !== null && Storage::exists($oldImage)){
            Storage::delete($oldImage);
        }

        return redirect()
        ->route('productos.index')
        ->with('feedback.message', 'El producto <b>' . e($product->title) . '</b> ha sido actualizado correctamente.');
    }
}
