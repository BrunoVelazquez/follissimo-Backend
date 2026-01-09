<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Tamaño;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $tamaños = Tamaño::all();
        return view('producto.create', compact('categorias'), compact('tamaños'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        $validateData = $request->validated();

        $producto = new Producto();

        $producto->nombre = $validateData['Nombre'];
        $producto->precio = $validateData['Precio'];
        $producto->color = $validateData['Color'];
        $producto->tipo_categoria = Categoria::where('tipo',$validateData['Categoria'])->first()->id;
        $producto->tipo_tamaño = Tamaño::where('tipo',$validateData['Tamaño'])->first()->id;
        $producto->descripción = $validateData['Descripcion'];

     
        $uploadedFile = $request->file('imagen');
        $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), ['folder'=>'product_images']);
                    
        $imageURL = $uploadResult->getSecurePath();
        $public_id = $uploadResult->getPublicId();
        $producto->imagen = $imageURL;
        $producto->id_imagen = $public_id;
        
        $producto->save();
        return redirect('/productos')
            ->with('success', 'Producto creado existosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('producto.show')->with('producto',$producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $tamaños = Tamaño::all();
        return view('producto.edit', compact('categorias'), compact('tamaños'))->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
    
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required|numeric|min:0',
            'Color' => 'required',
            'Categoria' => 'required',
            'Tamaño' => 'required',
            'Descripcion' => 'required|max:255',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Agrega las reglas de validación de la imagen si es necesario
        ]);
    
        $producto->nombre = $request->input('Nombre');
        $producto->precio = $request->input('Precio');
        $producto->color = $request->input('Color');
        $producto->tipo_categoria = Categoria::where('tipo', $request->input('Categoria'))->first()->id;
        $producto->tipo_tamaño = Tamaño::where('tipo', $request->input('Tamaño'))->first()->id;
        $producto->descripción = $request->input('Descripcion');
    
        $imagenActual = $producto->imagen;
    
        if ($request->hasFile('imagen')) {
            Cloudinary::destroy($producto->id_imagen);
            $file = $request->file('imagen');
            $uploadResult = Cloudinary::upload($file->getRealPath(), ['folder' => 'product_images']);
            $imageURL = $uploadResult->getSecurePath();
            $public_id = $uploadResult->getPublicId();
        }

        $producto->imagen = $imageURL;
        $producto->id_imagen = $public_id;
    
        $producto->update();
    
        return redirect('/productos')
            ->with('success', 'Producto editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect('/productos')
            ->with('success', 'Producto eliminado exitosamente');
    }

    public function filtrar(Request $request)
    {
        $productosFiltrados = Producto::filtro($request)->get();
        return view('producto.filtrar', compact('productosFiltrados'));
    }


}
