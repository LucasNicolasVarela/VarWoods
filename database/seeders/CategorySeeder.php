<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Mesas',        'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Sillas',       'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Estanterías',  'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Escritorios',  'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Placares',     'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Cajoneras',    'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Camas',        'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
