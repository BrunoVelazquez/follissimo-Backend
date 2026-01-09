<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\TamañoController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\CompraController;

use App\Http\Controllers\Api\ClienteAuthenticatedSessionController;

Route::middleware('guest')->group(function () {
    Route::post('/login', [ClienteAuthenticatedSessionController::class, 'login'])->name('ClienteAuthenticatedSessionController.login');
    Route::post('/registrar', [ClienteAuthenticatedSessionController::class, 'registrarUsuario'])->name('ClienteAuthenticatedSessionController.registrarUsuario');
});


Route::get('/productos',[ProductoController::class, 'index'])->name('producto.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('producto.show');
Route::get('/productos/tamaño/{tipo_tamaño}', [ProductoController::class, 'productosPorTamaño'])->name('producto.productosPorTamaño');
Route::get('/productos/categoria/{tipo_categoria}', [ProductoController::class, 'productosPorCategoria'])->name('producto.productosPorCategoria');

Route::get('/categorias',[CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/tamaños',[TamañoController::class, 'index'])->name('tamaño.index');

Route::group(['middleware'=>["auth:sanctum"]],function(){
    Route::post('/logout', [ClienteAuthenticatedSessionController::class, 'logout'])->name('ClienteAuthenticatedSessionController.logout');
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.index');
    Route::post('/compra', [CompraController::class, 'store'])->name('compra.store');
    Route::post('/process_payment',[CompraController::class, 'MPOrder']);
    Route::get('/perfil',[ClienteAuthenticatedSessionController::class, 'perfil'])->name('ClienteAuthenticatedSessionController.perfil');

    Route::put('/pedidos/cancelar', [PedidoController::class, 'cancelar'])->name('pedido.cancelar');
});
