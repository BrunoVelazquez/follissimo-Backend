<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ClienteResource;
use Illuminate\View\View;
use App\Http\Requests\RegistroRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteAuthenticatedSessionController extends Controller
{
    public function registrarUsuario(RegistroRequest $request)
    {
        $validateData = $request->validated();

       
        $cliente = new Cliente();
        $cliente->nombre = $validateData['nombre'];
        $cliente->apellido = $validateData['apellido'];
        $cliente->direccion = $validateData['direccion'];
        $cliente->email = $validateData['email'];
        $cliente->password = Hash::make($validateData['password']);
        $cliente->save();

        $token = $cliente->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['cliente' => $cliente, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function login (Request $request)       
    {
        $cliente = Cliente::where('email', $request['email'])->first();

           if(isset($cliente->id)){
            if(Hash::check($request->password, $cliente->password)){
                $token = $cliente->createToken('auth_token')->plainTextToken;

                return response()
                ->json([
                    'message' => 'Bienvenido '.$cliente->name,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'cliente' => $cliente,
                ]);

            }else{
                return response()->json([
                    'error' => 'La contraseña es incorrecta.'
                ],401);
            }
        }else{
            return response()->json([
                'error' => 'Usuario no registrado.'
            ],400);
        }

    } 
    
    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'res' => true,
            'msg' => "Se ha cerrado sesión.",
        ],200);
    }

    public function perfil(){

        $user = Auth::user();
    
        $id_cliente = $user->id;
        
        $cliente = Cliente::where('id', $id_cliente)->first();
        

        if ($cliente == null) {
            return response()->json(['message' => 'Cliente no encontrado'], 400);
        } else {
            return response()->json(new ClienteResource($cliente), 200);
        }
        
    }

}
