<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetallePedido extends Model
{
    protected $table = 'detalles_pedido';
    public $timestamps = true;

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function pedidos()
    {
        return $this->belongsTo(Producto::class, 'id_pedido');
    }
}
