<?php

namespace App\Http\Controllers;

use App\Models\Tamaño;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TamañoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tamaños = Tamaño::all();
        return view('tamaño.index', compact('tamaños'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tamaño.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombre'=>'required',
        ]);

        $tamaño = new Tamaño ();
        $tamaño->tipo = $request->get('Nombre');

        $tamaño->save();

        return redirect('/tamaños')
            ->with('success', 'Tamaño creado existosamente' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Tamaño $Tamaño)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tamaño = Tamaño::find($id);
        return  view('tamaño.edit')->with('tamaño',$tamaño);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tamaño = Tamaño::find($id);

        $this->validate($request, [
            'Nombre'=>'required',
        ]);

        $tamaño->tipo = $request->get('Nombre');
        $tamaño->update();

        return redirect('/tamaños')
            ->with('success', 'Tamaño editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tamaño = Tamaño::find($id);
        if (Producto::where('tipo_tamaño',$id)->first() == null) {
            $tamaño->delete();
            return redirect('/tamaños')->with('success', 'Tamaño eliminado exitosamente');
        }
        else
            return redirect('/tamaños')->with('error', 'No se pudo eliminar el tamaño');
    }
}
