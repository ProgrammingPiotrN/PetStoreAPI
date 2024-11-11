<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowOrderRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz tutaj dodać logikę autoryzacji
        return true; // Zwróć true, jeśli użytkownik jest uprawniony
    }

    public function rules()
    {
        return [
            'id' => 'required|integer|exists:orders,id', // Sprawdzamy, czy zamówienie istnieje
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Order ID is required.',
            'id.exists' => 'The order does not exist.',
        ];
    }
}
