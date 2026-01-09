<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoPedido extends Model
{
    use SoftDeletes;
    protected $table = 'estados_pedido';

    public function estados_pedido() {
        return $this->hasMany('App\Models\Pedido');
    }
}
