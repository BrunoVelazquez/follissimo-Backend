<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombre'=>'required',
        ]);

        $categoria = new Categoria();
        $categoria->tipo = $request->get('Nombre');

        $categoria->save();

        return redirect('/categorias')
            ->with('success', 'Nueva categoria creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        $this->validate($request, [
            'Nombre'=>'required',
        ]);

        $categoria->tipo = $request->get('Nombre');
        $categoria->update();

        return redirect('/categorias')
            ->with('success', 'Categoria editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if (Producto::where('tipo_categoria',$id)->first() == null) {
            $categoria->delete();
            return redirect('/categorias')->with('success', 'categoria eliminada exitosamente');
        }
        else
            return redirect('/categorias')->with('error', 'No se pudo eliminar la categoria');
    }
}
