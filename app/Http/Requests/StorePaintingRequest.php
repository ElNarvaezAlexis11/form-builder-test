<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaintingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'painting.name'  => 'required|string|max:100',
            'painting.width'  => 'required|numeric',
            'painting.height' => 'required|numeric',
            'painting.idPainter' => 'required|numeric|exists:painter,id'
        ];
    }
}
