<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPetRequest extends FormRequest
{
    /**
     *
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'category.id' => 'required|integer',
            'category.name' => 'required|string',
            'name' => 'required|string|max:255',
            'photoUrls' => 'required|array',
            'photoUrls.*' => 'string|url',
            'tags' => 'nullable|array',
            'tags.*' => 'integer',
            'status' => 'required|string|in:available,pending,sold',
        ];
    }

    /**
     *
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'ID zwierzęcia jest wymagane.',
            'category.id.required' => 'ID kategorii jest wymagane.',
            'category.name.required' => 'Nazwa kategorii jest wymagana.',
            'name.required' => 'Nazwa zwierzęcia jest wymagana.',
            'photoUrls.required' => 'Musisz podać przynajmniej jeden URL zdjęcia.',
            'status.required' => 'Status zwierzęcia jest wymagany.',
            'status.in' => 'Status musi być jednym z: available, pending, sold.',
        ];
    }
}
