<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@varwoods.com',

            // Importante usar la fachada Hash de laravel. Es imporante por que actualmente Hash::make usa bycrypt no hay garantia de que luego laravel no cambie el algoritmo de hash, por lo que es mejor usar la fachada para que no de error el editor ademas de que permite el autocompletar.
            'password' => Hash::make('asdasdasd'),
        ]);
    }
}
