<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Nombre'=> 'bail|required',
            'Precio' => 'required|numeric|min:0',
            'Color' =>'required',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'Categoria'=>'required',
            'Tamaño'=>'required',
            'Descripcion' => 'required|max:255',
        ];
    }
}
