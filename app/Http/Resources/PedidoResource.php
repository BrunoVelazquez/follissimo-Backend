<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_pedido' => $this->id,
            'monto_total'  => $this->monto_total,
            'fecha' => $this->fecha,
            'estado' => new EstadoResource($this->estado),
        ];
    }
}
