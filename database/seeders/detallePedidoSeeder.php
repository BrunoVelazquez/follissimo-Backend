<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ids_productos = DB::table('productos')->pluck('id');
        $ids_pedidos = DB::table('pedidos')->pluck('id');

        for ( $i = 0 ; $i < 10 ; $i++ ) {
            DB::table('detalles_pedido')->insert([
                'id_producto' => $ids_productos->random(),
                'id_pedido' => $ids_pedidos->random(),
                'cantidad' => rand(1,4),
                'monto_subtotal'=> rand(1,10),
            ]);
        }
    }
}
