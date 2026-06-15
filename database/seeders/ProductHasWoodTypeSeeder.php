<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'product_fk' => 1,
                'wood_type_fk' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 2,
                'wood_type_fk' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 3,
                'wood_type_fk' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_fk' => 4,
                'wood_type_fk' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
