<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyPetRequest extends FormRequest
{
    public function authorize()
    {
        // Zawsze możesz dodać dodatkowe sprawdzenie uprawnień
        return true; // Zwróć true, jeśli użytkownik jest uprawniony do usunięcia
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:pets,id', // Sprawdza, czy zwierzę o danym ID istnieje
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Pet ID is required.',
            'id.exists' => 'Pet not found.',
        ];
    }
}

