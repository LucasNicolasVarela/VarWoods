<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductHasWoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_have_wood_type')->insert([

            // Producto 1 - Mesa Rectangular Premium
            [
                'product_fk' => 1,
                'wood_type_fk' => 2, // Roble
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 1,
                'wood_type_fk' => 6, // Petiribí
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 2 - Estantería Industrial Modular
            [
                'product_fk' => 2,
                'wood_type_fk' => 1, // Pino
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 2,
                'wood_type_fk' => 5, // Eucalipto
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 3 - Silla Clásica Tapizada
            [
                'product_fk' => 3,
                'wood_type_fk' => 4, // Álamo
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 4 - Escritorio Ejecutivo
            [
                'product_fk' => 4,
                'wood_type_fk' => 6, // Petiribí
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 5 - Mesa Redonda Familiar
            [
                'product_fk' => 5,
                'wood_type_fk' => 2, // Roble
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 6 - Banco Alto de Barra
            [
                'product_fk' => 6,
                'wood_type_fk' => 1, // Pino
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 7 - Biblioteca de Diseño
            [
                'product_fk' => 7,
                'wood_type_fk' => 8, // Cedro
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 8 - Rack para Televisor
            [
                'product_fk' => 8,
                'wood_type_fk' => 4, // Álamo
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 9 - Mesa Ratona Minimalista
            [
                'product_fk' => 9,
                'wood_type_fk' => 7, // Acacia
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 10 - Silla Ergonómica
            [
                'product_fk' => 10,
                'wood_type_fk' => 3, // Cerezo
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 11 - Mesa Extensible
            [
                'product_fk' => 11,
                'wood_type_fk' => 2, // Roble
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 11,
                'wood_type_fk' => 10, // Lapacho
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 12 - Estantería Compacta
            [
                'product_fk' => 12,
                'wood_type_fk' => 1, // Pino
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 13 - Mueble Organizador
            [
                'product_fk' => 13,
                'wood_type_fk' => 8, // Cedro
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 14 - Banqueta Moderna
            [
                'product_fk' => 14,
                'wood_type_fk' => 5, // Eucalipto
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 15 - Mesa de Reuniones
            [
                'product_fk' => 15,
                'wood_type_fk' => 10, // Lapacho
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 16 - Aparador Contemporáneo
            [
                'product_fk' => 16,
                'wood_type_fk' => 6, // Petiribí
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 17 - Biblioteca Modular
            [
                'product_fk' => 17,
                'wood_type_fk' => 8, // Cedro
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 17,
                'wood_type_fk' => 7, // Acacia
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 18 - Silla de Comedor Premium
            [
                'product_fk' => 18,
                'wood_type_fk' => 3, // Cerezo
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Producto 19 - Mesa Auxiliar Decorativa
            [
                'product_fk' => 19,
                'wood_type_fk' => 9, // Sauce
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
