<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'color' => $this->color,
            'imagen' => $this->imagen,
            'tipo_categoria' => $this->categoria->tipo,
            'tipo_tamaño' => $this->tamaño->tipo,
            'descripción' => $this->descripción
        ];
    }
}
