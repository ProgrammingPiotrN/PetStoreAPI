<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        // Możesz tutaj dodać logikę autoryzacji
        return true;
    }

    public function rules()
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('username'), // Unikalność emaila, ale z wyjątkiem bieżącego użytkownika
            'phone' => 'required|string|max:15',
            'userStatus' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'First name is required.',
            'lastName.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.required' => 'Phone number is required.',
            'userStatus.required' => 'User status is required.',
        ];
    }
}
