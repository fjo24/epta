<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubproductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_es' => 'min:3|max:60',
            'nombre_en' => 'min:3|max:60',
            'nombre_pt' => 'min:3|max:60',
            'orden' => 'required',
            'imagen_destacada' => 'image|required'
        ];
    }
}
