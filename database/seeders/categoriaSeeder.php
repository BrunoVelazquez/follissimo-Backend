<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'tipo'=> "PLANTA INTERIOR",
        ]);

        DB::table('categorias')->insert([
            'tipo'=> "PLANTA EXTERIOR",
        ]);

        DB::table('categorias')->insert([
            'tipo'=> "FLOR HABITUAL",
        ]);

        DB::table('categorias')->insert([
            'tipo'=> "FLOR EXOTICA",
        ]);

        DB::table('categorias')->insert([
            'tipo'=> "INSUMO",
        ]);
    }
}
