<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchase_orders')->insert([
            [
                'user_id' => 2,
                'client_name' => 'Usuario',
                'amount' => 150000,
                'status' => 'Pago aprobado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
