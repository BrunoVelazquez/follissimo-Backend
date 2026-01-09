<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetallePedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_detalle' =>$this->id,
            'id_pedido' =>$this->id_pedido,
            'id_producto' => $this->id_producto,
            'cantidad' => $this->cantidad,
            'monto_subtotal' => $this->monto_subtotal,
        ];
    }
}
