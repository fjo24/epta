<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContenidoRequest extends FormRequest
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
            'titulo_es' => 'min:4|required',
            'titulo_en' => 'min:4|required',
            'titulo_pt' => 'min:4|required',
            'contenido_es' => 'min:15|max:8000|required',
            'contenido_en' => 'min:15|max:8000|required',
            'contenido_pt' => 'min:15|max:8000|required',
        ];
    }
}
