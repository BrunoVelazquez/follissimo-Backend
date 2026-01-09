<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegistroRequest extends FormRequest 
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required','string'],
            'apellido' => ['required','string'],
            'direccion' => ['required','string'],
            'email' => ['required', 'string', 'email','max:255','unique:clientes'],
            'password' => ['required', 'string','min:5'],
        ];
    }

}