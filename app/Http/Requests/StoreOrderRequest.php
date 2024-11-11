<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz tutaj dodać logikę autoryzacji
        return true; // Zwróć true, jeśli użytkownik jest uprawniony
    }

    public function rules()
    {
        return [
            'petId' => 'required|integer|exists:pets,id', // Sprawdzamy, czy petId istnieje w tabeli pets
            'quantity' => 'required|integer|min:1', // Ilość musi być liczbą większą lub równą 1
            'shipDate' => 'required|date', // Data wysyłki musi być poprawnym formatem daty
            'status' => 'required|string|in:placed,shipped,delivered,canceled', // Możliwe statusy
            'complete' => 'required|boolean', // Pole 'complete' musi być boolean (0 lub 1)
        ];
    }

    public function messages()
    {
        return [
            'petId.required' => 'Pet ID is required.',
            'petId.exists' => 'The selected pet ID does not exist.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be an integer.',
            'quantity.min' => 'Quantity must be at least 1.',
            'shipDate.required' => 'Shipping date is required.',
            'shipDate.date' => 'Shipping date must be a valid date.',
            'status.required' => 'Order status is required.',
            'status.in' => 'Invalid status. Allowed values are: placed, shipped, delivered, canceled.',
            'complete.required' => 'Completion status is required.',
            'complete.boolean' => 'Completion status must be true or false.',
        ];
    }
}

