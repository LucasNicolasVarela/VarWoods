<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*  -----------------------
                NOTAS
    ------------------------
Debe tener al menos dos metodos públicos:
    - up()
        Acá van las instucciones que queremos que se ejecuten al correr la migración, o sea cambios que queremos aplicar a la base de datos.

    - down().
        Acá van las instrucciones que queremos que se ejecuten al revertir la migración, o sea cambios realizas en el método up() que queremos deshacer.
*/


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            /*
            La clase schema es la clase de laravel que nos permite modificar la base de datos, principalmente tablas.

            Entre sus métodos está create() que nos permite crear una tabla.
            Recibe dos parámetros:
                - String con el nombre de la tabla a crear.
                - Closure. La funsión con las instrucciones para crear la tabla.
            */


        /*
        # productos
            - producto_id       BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY
            - title             VARCHAR(100) NOT NULL
            - price             INT NOT NULL
            - description       TEXT
            - release_date      DATE
         */

            $table->id();
            $table->string('title', 100);
            $table->unsignedInteger('price');
            $table->date('release_date');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
