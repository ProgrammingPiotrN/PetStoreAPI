<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz tutaj dodać logikę autoryzacji
        return true; // Zwraca true, jeśli użytkownik jest uprawniony
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:available,pending,sold', // Przykład statusu
            'category' => 'nullable|array', // Jeżeli istnieje, musi być tablicą
            'category.id' => 'nullable|integer|exists:categories,id', // Walidacja ID kategorii
            'category.name' => 'nullable|string|max:255', // Walidacja nazwy kategorii (opcjonalna)
            'photoUrls' => 'nullable|array', // Tablica zdjęć
            'photoUrls.*' => 'nullable|url', // Każdy element tablicy musi być poprawnym URL-em
            'tags' => 'nullable|array', // Tablica tagów
            'tags.*.name' => 'nullable|string|max:255', // Walidacja tagów, gdzie każdy tag to obiekt z nazwą
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pet name is required.',
            'status.required' => 'Pet status is required.',
            'category.id.exists' => 'The category ID must exist in the database.',
            'photoUrls.*.url' => 'Each photo URL must be a valid URL.',
            'tags.*.name.max' => 'Each tag name should not exceed 255 characters.',
        ];
    }
}

