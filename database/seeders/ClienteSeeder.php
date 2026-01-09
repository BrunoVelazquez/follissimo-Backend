<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = ['Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Lucía', 'Sofía', 'Miguel', 'Julia', 'Diego'];
        $apellidos = ['González', 'Pérez', 'Rodríguez', 'García', 'López', 'Fernández', 'Martínez', 'Sánchez', 'Alonso', 'Ramírez'];
        $calles = ['San Juan', 'Santa Ana', 'Avenida del Sol', 'Calle Mayor', 'Calle de la Paz', 'Avenida de la Libertad', 'Calle Real', 'Avenida de la Constitución', 'Paseo de la Alameda', 'Calle de los Olmos'];

        for ( $i = 0 ; $i < 5 ; $i++ ) {
            $nombre = $nombres[array_rand($nombres)];
            $apellido = $apellidos[array_rand($apellidos)];

            DB::table('clientes')->insert([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'direccion' => $calles[array_rand($calles)].' '.rand(0,1000),
                'email' => $nombre.'_'.$apellido.'@gmail.com',
                'password' => Hash::make('12345'),
                ]);
        }
    }
}
