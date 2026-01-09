<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ids_clientes = DB::table('clientes')->pluck('id');
        $ids_estados_pedido = DB::table('estados_pedido')->pluck('id');
        for ( $i = 0 ; $i < 7 ; $i++ ) {

            DB::table('pedidos')->insert([
                'id_cliente' => $ids_clientes->random(),
                'monto_total' => rand(49,100),
                'id_estado' => $ids_estados_pedido->random()
                ]);
        }
    }
}
