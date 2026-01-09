<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use OpenApi\Annotations as OA;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\Response;
use App\Http\Resources\CategoriaResource;

class CategoriaController extends Controller
{
/** Muestra todas las categorias
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/categorias",
 *     operationId="getCategoriasList",
 *     tags={"Categorias"},
 *     summary="Obtener lista de categorías",
 *     description="Obtiene la lista de todas las categorias",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa",
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="No se encontraron categorias"
 *     )
 * )
 */
    public function index()
    {
        $categorias = Categoria::all();

        if ($categorias->count() > 0) {
            return response()->json(CategoriaResource::collection($categorias), 200);
        } else {
            return response()->json(['message' => 'No se encontraron categorias'], 404);
        }
    }

}
