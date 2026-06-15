<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wood_types')->insert([
            [
                'wood_type_id' => 1,
                'name' => 'Pino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 2,
                'name' => 'Roble',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 3,
                'name' => 'Cerezo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 4,
                'name' => 'Álamo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 5,
                'name' => 'Eucalipto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 6,
                'name' => 'Petiribí',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 7,
                'name' => 'Acacia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 8,
                'name' => 'Cedro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 9,
                'name' => 'Sauce',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wood_type_id' => 10,
                'name' => 'Lapacho',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
