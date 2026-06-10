<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        // Acá se definen los seeders que se van a ejecutar, el orden es importante por que si por ejemplo el ProductSeeder se ejecuta antes que el CategoriesSeeder va a dar error por que el ProductSeeder necesita que existan las categorías para poder asignarles un producto.

        // Ya lo hicimos a mano mil veces, y user requiere borrarlo desde SQL

        $this->call([
            UserSeeder::class,
            CategoriesSeeder::class,
            ProductSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
