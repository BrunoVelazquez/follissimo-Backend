<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use OpenApi\Annotations as OA;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\Response;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\EstadoPedido;
use App\Models\DetallePedido;
use App\Http\Resources\PedidoResource;
use App\Http\Resources\DetallePedidoResource;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    
/** Muestra todos los pedidos para un id de cliente
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/pedidos",
 *     operationId="pedidoIndexID",
 *     tags={"Pedido"},
 *     summary="Obtener pedidos de un cliente",
 *     description="Obtiene la lista de pedidos asociados a un cliente.",
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de pedidos del cliente",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/PedidoResource")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="No se encontraron pedidos del cliente",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Pedidos no encontrados"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="No autorizado",
 *     ),
 * )
 */
    public function index(){
      
        $cliente = Auth::user();
    
        $id_cliente = $cliente->id;

        $pedidos = Pedido::where('id_cliente', $id_cliente)->get();

        if ($pedidos->isEmpty()) {
            return response()->json(['message' => 'Pedidos no encontrados'], 400);
        } else {
            return response()->json(PedidoResource::collection($pedidos), 200);
        }
    }

/**
 * Muestra el detalle de pedido para cierto ID de Pedido
 * @param  int  $id_pedido
 * @return \Illuminate\Http\Response
 * @OA\Get(
 *     path="/rest/pedidos/{id_pedido}/detalle",
 *     operationId="pedidoShow",
 *     tags={"Pedido"},
 *     summary="Obtener detalles de un pedido",
 *     description="Obtiene la información de un detalle de pedido en base a su ID.",
 *     @OA\Parameter(
 *         description="Parámetro necesario para la consulta de detalle de pedido para un producto",
 *         name="id_pedido",
 *         in="path",
 *         description="ID del pedido",
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Información del detalle de pedido",
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Detalle de pedido no encontrado"
 *     )
 * )
 */
public function show($id_pedido){

    $detalle = DetallePedido::where('id_pedido', $id_pedido)->get();

    if ($detalle->isEmpty()) {
        return response()->json(['message' => 'Detalle/s no encontrado/s'], 404);
    } else {
        return response()->json(DetallePedidoResource::collection($detalle), 200);
    }
}

/** Dado un producto dado, lo cancela
 * @return \Illuminate\Http\Response
 * @OA\Put(
 *     path="/rest/pedidos/cancelar",
 *     operationId="pedidoCancelar",
 *     tags={"Pedido"},
 *     summary="Cancelar un pedido",
 *     description="Cancela un pedido en base a su ID.",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"email", "id_pedido"},
 *                 @OA\Property(property="email", type="string"),
 *                 @OA\Property(property="id_pedido", type="integer"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Pedido cancelado exitosamente",
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Pedido/Cliente no encontrado"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Pedido ya fue cancelado/entregado"
 *     )
 * )
 */
    public function cancelar(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'id_pedido' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Datos inválidos'], 422);
        }

        $validateData = $validator->validated();

        $cliente = Cliente::where('email', $validateData['email'] )->first();

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $id_cliente = $cliente->id;

        $pedido = Pedido::where('id', $validateData['id_pedido'])
                        ->where('id_cliente', $id_cliente)
                        ->first();

        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $estadoCancelado= EstadoPedido::where('estado', 'CANCELADO')->first();
        $estadoEntregado= EstadoPedido::where('estado', 'ENTREGADO')->first();

        if($pedido->id_estado == $estadoCancelado->id){
            return response()->json(['message' => 'No se puede cancelar un pedido ya cancelado'], 422);
        }

        if($pedido->id_estado == $estadoEntregado->id){
            return response()->json(['message' => 'No se puede cancelar un pedido ya entregado'], 422);
        }

        $pedido->id_estado = $estadoCancelado->id;
        $pedido->update();

        return response()->json(['message' => 'Pedido cancelado exitosamente'], 200);
    }
}
