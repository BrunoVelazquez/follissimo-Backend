<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([
            'Planta interior',
            'Planta exterior',
            'FLor habitual',
            'FLor exótica',
            'Insumo',
        ] as $tipo) {
            Category::create(['name' => $tipo]);
        }

    }
}
