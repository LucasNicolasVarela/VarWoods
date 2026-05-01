<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'id' => 1,
                'title' => 'Cómo elegir la madera adecuada para tus muebles',
                'contenido_blog' => 'Elegir la madera adecuada para tus muebles es crucial para garantizar su durabilidad y estética. En este artículo, te ofrecemos una guía completa sobre los diferentes tipos de madera, sus características y cómo seleccionar la mejor opción para tus proyectos de mobiliario.',
                'resumen' => 'Descubre cómo elegir la madera perfecta para tus muebles con nuestra guía completa.',
                'category_name' => 'Madera',
                'fecha_publicacion' => '2024-06-01',
            ],
            [
                'id' => 2,
                'title' => 'Tendencias en muebles de madera para 2024',
                'contenido_blog' => 'El diseño de muebles de madera evoluciona constantemente. En 2024, las tendencias apuntan hacia estilos minimalistas, acabados naturales y la combinación de madera con materiales como el metal y el vidrio. En este artículo exploramos las principales tendencias que marcarán el diseño de interiores.',
                'resumen' => 'Conocé las tendencias en muebles de madera que dominarán el 2024.',
                'category_name' => 'Diseño',
                'fecha_publicacion' => '2024-06-10',
            ],
            [
                'id' => 3,
                'title' => 'Cómo cuidar y mantener tus muebles de madera',
                'contenido_blog' => 'El mantenimiento adecuado de los muebles de madera es clave para prolongar su vida útil. Desde la limpieza regular hasta la protección contra la humedad y el sol, existen diversas prácticas que ayudan a conservar su belleza original. Te contamos todo lo que necesitás saber.',
                'resumen' => 'Aprendé a mantener tus muebles de madera como nuevos por más tiempo.',
                'category_name' => 'Cuidado',
                'fecha_publicacion' => '2024-06-15',
            ],
            [
                'id' => 4,
                'title' => 'Ventajas de elegir muebles de madera maciza',
                'contenido_blog' => 'Los muebles de madera maciza se destacan por su durabilidad, resistencia y estética única. A diferencia de otros materiales, ofrecen una larga vida útil y pueden restaurarse fácilmente. En este artículo analizamos por qué son una excelente inversión.',
                'resumen' => 'Descubrí por qué los muebles de madera maciza son una gran elección.',
                'category_name' => 'Madera',
                'fecha_publicacion' => '2024-06-20',
            ],
        ]);
    }
}
