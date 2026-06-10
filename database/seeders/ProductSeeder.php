<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dentro de este metodo run() vamos a poner las intrucciones para insertar los registros en la tabla
        // Para esto existen tres formas principales de insertar registros en la base de datos usando laravel:
        // 1. Usar el constructor de consultas de laravel (Query Builder).
        // 2. Pedir el objeto PDO
        // 3. Usar Eloquent, el ORM de laravel.
        DB::table('product')->insert([
            [
                'id' => 1,
                'category_fk' => 1,
                'title' => 'Mesas de madera seleccionada',
                'price' => 400000,
                'release_date' => '2024-01-01',
                'description' => 'Mesas de madera de álamo, ideales para living y comedor. Con acabado hidrolaqueado y disponibles en varios tamaños.',
                'created_at' => now(), // El método now() nos devuelve la fecha y hora actual.
                'updated_at' => now(), // El método now() nos devuelve la fecha y hora actual.
            ],
            [
                'id' => 2,
                'category_fk' => 4,
                'title' => 'Estanterías estilo industrial',
                'price' => 230000,
                'release_date' => '2026-01-01',
                'description' => 'Estanterías de madera de álamo, pino y eucalipto. Ideales para living o oficina. Consultar por tamaños y acabados disponibles.',
                'created_at' => now(), // El método now() nos devuelve la fecha y hora actual.
                'updated_at' => now(), // El método now() nos devuelve la fecha y hora actual.
            ],
            [
                'id' => 3,
                'category_fk' => 2,
                'title' => 'Sillas de madera de álamo',
                'price' => 95000,
                'release_date' => '2025-01-06',
                'description' => 'Sillas de madera de álamo, ideales para comedor o escritorio. Disponibles en varios tamaños y acabados.',
                'created_at' => now(), // El método now() nos devuelve la fecha y hora actual.
                'updated_at' => now(), // El método now() nos devuelve la fecha y hora actual.
            ],
            [
                'id' => 4,
                'category_fk' => 2,
                'title' => 'Escritorios de madera petiribí',
                'price' => 350000,
                'release_date' => '2026-01-03',
                'description' => 'Escritorios de madera de petiribí, ideales para oficina. Acabado hidrolaqueado y disponibles en varios tamaños.',
                'created_at' => now(), // El método now() nos devuelve la fecha y hora actual.
                'updated_at' => now(), // El método now() nos devuelve la fecha y hora actual.
            ],
        ]);
    }
}
