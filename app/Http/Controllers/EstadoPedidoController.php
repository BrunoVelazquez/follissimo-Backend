<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoPedido;
use App\Models\Pedido;

class EstadoPedidoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados_pedido = EstadoPedido::all();
        return view('estadoPedido.index', compact('estados_pedido'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estadoPedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombre'=>'required',
        ]);

        $estado = new EstadoPedido();
        $estado->estado = $request->get('Nombre');

        $estado->save();

        return redirect('/estados')
            ->with('success', 'Nueva estado creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado_pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estado_pedido = EstadoPedido::find($id);
        return view('estadoPedido.edit')->with('estado_pedido',$estado_pedido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $estado_pedido = EstadoPedido::find($id);

        $this->validate($request, [
            'Nombre'=>'required',
        ]);

        $estado_pedido->estado = $request->get('Nombre');
        $estado_pedido->update();

        return redirect('/estados')
            ->with('success', 'Estado editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estado_pedido = EstadoPedido::find($id);
        if (Pedido::where('id_estado',$id)->first() == null) {
            $estado_pedido->delete();
            return redirect('/estados')->with('success', 'Estado eliminado exitosamente');
        }
        else
            return redirect('/estados')->with('error', 'No se pudo eliminar el estado');
    }
}
