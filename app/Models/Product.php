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

    protected $fillable = ['title', 'description', 'price', 'release_date']; // El atributo $fillable nos permite indicar qué campos de la tabla se pueden asignar masivamente. Esto es útil para evitar ataques de asignación masiva, donde un atacante puede enviar datos no deseados a través de un formulario y asignarlos a campos que no deberían ser asignados.


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
}
