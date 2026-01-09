<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TamañoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EstadoPedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('producto.update');
    Route::get('/productos/{id}/show', [ProductoController::class, 'show'])->name('product.show');
    Route::delete('/productos/{id}/delete', [ProductoController::class, 'destroy'])->name('producto.destroy');

    Route::get('/productos/filtrar', [ProductoController::class, 'filtrar'])->name('producto.filtrar');

    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::delete('/categorias/{id}/delete', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    Route::get('/tamaños', [TamañoController::class, 'index'])->name('tamaño.index');
    Route::get('/tamaños/create', [TamañoController::class, 'create'])->name('tamaño.create');
    Route::post('/tamaños', [TamañoController::class, 'store'])->name('tamaño.store');
    Route::get('/tamaños/{id}/edit', [TamañoController::class, 'edit'])->name('tamaño.edit');
    Route::put('/tamaños/{id}', [TamañoController::class, 'update'])->name('tamaño.update');
    Route::get('/tamaños/{id}', [TamañoController::class, 'show'])->name('tamaño.show');
    Route::delete('/tamaños/{id}/delete', [TamañoController::class, 'destroy'])->name('tamaño.destroy');

    Route::get('/estados', [EstadoPedidoController::class, 'index'])->name('estadoPedido.index');
    Route::get('/estados/create', [EstadoPedidoController::class, 'create'])->name('estadoPedido.create');
    Route::post('/estados', [EstadoPedidoController::class, 'store'])->name('estadoPedido.store');
    Route::get('/estados/{id}/edit', [EstadoPedidoController::class, 'edit'])->name('estadoPedido.edit');
    Route::put('/estados/{id}', [EstadoPedidoController::class, 'update'])->name('estadoPedido.update');
    Route::get('/estados/{id}', [EstadoPedidoController::class, 'show'])->name('estadoPedido.show');
    Route::delete('/estados/{id}/delete', [EstadoPedidoController::class, 'destroy'])->name('estadoPedido.destroy');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');

    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.index');

    Route::get('/pedidos/{id}/index', [PedidoController::class, 'show'])->name('pedido.show');
});

require __DIR__.'/auth.php';
