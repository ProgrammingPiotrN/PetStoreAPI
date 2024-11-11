<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz dodać logikę autoryzacji, jeśli jest potrzebna
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
        ];
    }
}

