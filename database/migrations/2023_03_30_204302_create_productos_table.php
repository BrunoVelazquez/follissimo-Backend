<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('precio');
            $table->string('color');
            $table->string('imagen');
            $table->string('id_imagen');
            $table->bigInteger('tipo_categoria');
            $table->foreign('tipo_categoria')
                ->references('id')->on('categorias');
            $table->bigInteger('tipo_tamaño');
            $table->foreign('tipo_tamaño')
                ->references('id')->on('tamaños');
            $table->string('descripción');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
