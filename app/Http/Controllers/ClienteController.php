<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        $pedidos_por_cliente = Pedido::select('id_cliente', DB::raw('count(*) as cantidad_pedidos'))
                           ->groupBy('id_cliente')
                           ->get()
                           ->toArray();
        $cantidad_pedidos_por_cliente = [];
        foreach ($clientes as $cliente) {
            $cantidad_pedidos_por_cliente[$cliente->id] = 0;
        }
        foreach ($pedidos_por_cliente as $pedido) {
            $cantidad_pedidos_por_cliente[$pedido['id_cliente']] = $pedido['cantidad_pedidos'];
        }
        return view('cliente.index', compact('clientes'), compact('cantidad_pedidos_por_cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
