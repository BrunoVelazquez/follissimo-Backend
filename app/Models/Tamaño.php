<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tamaño extends Model
{
    protected $table = 'tamaños';
    use SoftDeletes;

    public function productos() {
        return $this->hasMany('App\Models\Producto');
    }
}
