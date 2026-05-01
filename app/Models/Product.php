<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
    Por convencion el nombre de la clase del modelo debe ser el mismo que el nombre de la tabla pero en singular y con la primera letra en mayuscula. En este caso, el modelo se llama Product y la tabla se llama product.

    Esto es para trabajar con la convencion de Laravel, pero se puede usar protected $table = 'nombre_de_la_tabla'; para indicarle a Laravel el nombre de la tabla que corresponde a este modelo, en caso de que no siga la convencion.
 */

class Product extends Model
{
    protected $fillable = ['title', 'description', 'price', 'release_date']; // El atributo $fillable nos permite indicar qué campos de la tabla se pueden asignar masivamente. Esto es útil para evitar ataques de asignación masiva, donde un atacante puede enviar datos no deseados a través de un formulario y asignarlos a campos que no deberían ser asignados.
}
