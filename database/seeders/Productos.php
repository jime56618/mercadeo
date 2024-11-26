<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;



class Productos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Productos')->insert([
            'nombre' => Str::random(10),
            'descripcion' => 'holaa',
            'imagen' => 'assets/c1.jpg',
            'precio' => '34.50'
           
        ]);
    }
}
