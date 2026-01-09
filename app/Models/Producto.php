<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = true;
    use SoftDeletes;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'tipo_categoria');
    }

    public function tamaño()
    {
        return $this->belongsTo(Tamaño::class,'tipo_tamaño');
    }
}
