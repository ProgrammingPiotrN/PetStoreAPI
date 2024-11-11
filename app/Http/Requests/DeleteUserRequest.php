<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz tutaj dodać logikę autoryzacji
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|exists:users,username', // Sprawdzamy, czy użytkownik o tym username istnieje
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required.',
            'username.exists' => 'User not found.',
        ];
    }
}
