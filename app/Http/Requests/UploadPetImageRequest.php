<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPetImageRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'image.required' => 'Obraz jest wymagany.',
            'image.image' => 'Plik musi być obrazem.',
            'image.mimes' => 'Obraz musi być w formacie jpeg, png, jpg lub gif.',
            'image.max' => 'Obraz nie może przekraczać 2MB.',
        ];
    }
}
