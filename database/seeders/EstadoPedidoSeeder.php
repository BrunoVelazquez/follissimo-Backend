<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados_pedido')->insert([
            'estado' => 'PENDIENTE',
        ]);

        DB::table('estados_pedido')->insert([
            'estado' => 'CONFIRMADO',
        ]);

        DB::table('estados_pedido')->insert([
            'estado' => 'ENTREGADO',
        ]);

        DB::table('estados_pedido')->insert([
            'estado' => 'CANCELADO',
        ]);
    }
}
