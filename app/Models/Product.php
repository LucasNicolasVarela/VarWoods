<?php

namespace App\Models;


use Dom\Attr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/*
    Por convencion el nombre de la clase del modelo debe ser el mismo que el nombre de la tabla pero en singular y con la primera letra en mayuscula. En este caso, el modelo se llama Product y la tabla se llama product.

    Esto es para trabajar con la convencion de Laravel, pero se puede usar protected $table = 'nombre_de_la_tabla'; para indicarle a Laravel el nombre de la tabla que corresponde a este modelo, en caso de que no siga la convencion.
 */

class Product extends Model
{

    protected $table = 'product'; // Esto es para indicarle a Laravel el nombre de la tabla que corresponde a este modelo, en caso de que no siga la convencion.

    protected $fillable = ['title', 'description', 'price', 'release_date', 'img', 'img_description', 'category_fk']; // El atributo $fillable nos permite indicar qué campos de la tabla se pueden asignar masivamente. Esto es útil para evitar ataques de asignación masiva, donde un atacante puede enviar datos no deseados a través de un formulario y asignarlos a campos que no deberían ser asignados.


    /********************************* */
         /* Accessors y Mutators */
    /********************************* */
    // Esto es importante: Los accessors y Mutators son métodos especiales que nos permiten modificar el valor de un atributo antes de guardarlo en la base de datos (Mutators) o antes de mostrarlo en la vista (Accessors). Esto es útil para formatear los datos de una manera específica o para realizar cálculos antes de mostrar los datos.

    public function price(): Attribute{
        return Attribute::make(
            /*get: function($value){
                return $value / 100; // Esto es para convertir el precio de centavos a dólares antes de mostrarlo en la vista.
            },
            set: function($value){
                return $value * 100; // Esto es para convertir el precio de dólares a centavos antes de guardarlo en la base de datos.
            } */

            // Usando funciones flecha para simplificar el código:
            get: fn($value) => $value / 100, // Esto es para convertir el precio de centavos a dólares antes de mostrarlo en la vista.
            set: fn($value) => $value * 100 // Esto es para convertir el
        );
    }

    /********************************* */
         /* Relaciones de Eloquent */
    /********************************* */
    // Esto es importante: Las relaciones de Eloquent nos permiten definir las relaciones entre los modelos de nuestra aplicación.
    // Acá vamos a hacer la relacion parados sobre la tabla referenciante para lo que serían las categorías del producto
    // A tener en cuenta que necesitamos agregar algunos valores
    // 1 - Obligatorio String con el nombre de la clase del modelo de la tabla relacionada
    // 2 - Opcional String con el nombre de la clave foránea
    // 3 - Opcional String con el nombre de la clave primaria de la tabla relacionada En este caso es el id de Categories.
    // RECORDAR: para casos donde hay relacion de 1 a muchos existen dos tipos de metodos de elocuent que podemos  usar, belogsTo y hasMany, dependiendo de la tabla desde la que estemos parados. Si estamos parados sobre la tabla referenciante (en este caso product) usamos belongsTo, y si estamos parados sobre la tabla referenciada (en este caso categories) usamos hasMany.

    public function category(){
        return $this->belongsTo(Categories::class, 'category_fk', 'category_id');
    }

}
