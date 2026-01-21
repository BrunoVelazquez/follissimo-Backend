<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([
            'Grande',
            'Mediano',
            'Chico',
        ] as $tipo) {
            Size::create(['name' => $tipo]);
        }
    }
}
