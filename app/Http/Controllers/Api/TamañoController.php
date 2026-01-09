<?php

namespace App\Http\Controllers\Api;

use App\Models\Tamaño;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\Response;
use App\Http\Resources\TamañoResource;

class TamañoController extends Controller
{

/** Muestra todas los tamaños
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/tamaños",
 *     operationId="getTamañosList",
 *     tags={"Tamaños"},
 *     summary="Obtener lista de tamaños",
 *     description="Obtiene la lista de todos los tamaños",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa",
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="No se encontraron tamaños"
 *     )
 * )
 */
    public function index()
    {
        $tamaños = Tamaño::all();

        if ($tamaños->count() > 0) {
            return response()->json(TamañoResource::collection($tamaños), 200);
        } else {
            return response()->json(['message' => 'No se encontraron tamaños'], 404);
        }
    }
}
