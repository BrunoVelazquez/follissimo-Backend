<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use OpenApi\Annotations as OA;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\Response;
use App\Http\Resources\ProductoResource;

/**
 * @OA\Info(
 *     title="Folissimo API",
 *     version="1.0.0",
 *     description="Descripción de la API"
 * )
 */

class ProductoController extends Controller
{
/** Muentra todos los productos
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/productos",
 *     operationId="getProductosList",
 *     tags={"Productos"},
 *     summary="Obtener lista de productos",
 *     description="Obtiene la lista de todos los productos.",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa"
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Productos no encontrados"
 *     )
 * )
 */
     public function index(){
        $productos = Producto::all();

        if ($productos->count() > 0) {
            return response()->json(ProductoResource::collection($productos), 200);
        } else {
            return response()->json(['message' => 'No se encontraron productos'], 404);
        }
    }

/** Muestra todos los productos filtrados por un tamaño dado
 * @param  string  $tipo_tamaño
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/productos/tamaño/{tipo_tamaño}",
 *     operationId="getproductosPorTamaño",
 *     tags={"Productos"},
 *     summary="Obtener productos por tamaño",
 *     @OA\Parameter(
 *         name="tipo_tamaño",
 *         in="path",
 *         description="Tipo de tamaño",
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Productos no encontrados"
 *     )
 * )
 */
    public function productosPorTamaño($tipo_tamaño){

        $productos = Producto::whereHas('tamaño', function ($query) use ($tipo_tamaño) {
            $query->where('tipo', $tipo_tamaño);
        })->get();

        if ($productos->isEmpty()) {
            return response()->json(['message' => 'Productos no encontrados'], 404);
        } else {
            return response()->json(ProductoResource::collection($productos), 200);
        }
    }

 /** Muestra todos los productos filtrados por una categoria dada
 * @param  string $tipo_categoria
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/productos/categoria/{tipo_categoria}",
 *     operationId="getproductosPorCategoria",
 *     tags={"Productos"},
 *     summary="Obtener productos por categoría",
 *     @OA\Parameter(
 *         name="tipo_categoria",
 *         in="path",
 *         description="Tipo de categoría",
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Productos no encontrados"
 *     )
 * )
 */
    public function productosPorCategoria($tipo_categoria){

        $productos =Producto::whereHas('categoria', function ($query) use ($tipo_categoria) {
            $query->where('tipo', $tipo_categoria);
        })->get();

        if ($productos->isEmpty()) {
            return response()->json(['message' => 'Productos no encontrados'], 404);
        } else {
            return response()->json(ProductoResource::collection($productos), 200);
        }
    }

/**
 * Muentra un producto dado su id
 * @param  int  $id
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/productos/{id}",
 *     operationId="productoShow",
 *     tags={"Producto"},
 *     summary="Obtener información de un producto",
 *     description="Obtiene la información de un producto en base a su ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID del producto",
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Información del producto",
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Producto no encontrado"
 *     )
 * )
 */
    public function show($id){

        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        } else {
            return response()->json(new ProductoResource($producto), 200);
        }
    }
}
