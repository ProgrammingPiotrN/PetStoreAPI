<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz tutaj dodać logikę autoryzacji
        return true; // Zwróć true, jeśli użytkownik jest uprawniony
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:255|unique:users', // Sprawdzamy unikalność nazwy użytkownika
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Sprawdzamy unikalność emaila
            'password' => 'required|string|min:8', // Hasło musi mieć co najmniej 8 znaków
            'phone' => 'required|string|max:15',
            'userStatus' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required.',
            'username.unique' => 'The username has already been taken.',
            'firstName.required' => 'First name is required.',
            'lastName.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'phone.required' => 'Phone number is required.',
            'userStatus.required' => 'User status is required.',
        ];
    }
}
