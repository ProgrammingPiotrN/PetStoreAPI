<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyOrderRequest extends FormRequest
{
    public function authorize()
    {
        // Sprawdzamy, czy użytkownik ma prawo do usuwania zamówienia
        return true; // Zwróć true, jeśli użytkownik jest uprawniony
    }

    public function rules()
    {
        return [
            'id' => 'required|integer|exists:orders,id', // Sprawdzamy, czy zamówienie istnieje w bazie
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Order ID is required.',
            'id.exists' => 'The order does not exist or already deleted.',
        ];
    }
}
