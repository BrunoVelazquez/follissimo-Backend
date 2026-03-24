<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Product;

use App\Models\Category;
use App\Models\Size;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('products.create', compact('categories', 'sizes'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->size_id = $request->input('size_id');
        $product->description = $request->input('description');
        $product->save();

        return redirect('/products')
            ->with('success', 'Producto creado existosamente');
    }
}
