<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescargaRequest extends FormRequest
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
            'nombre_es' => 'required',
            'nombre_en' => 'required', 
            'nombre_pt' => 'required', 
            'orden' => 'required',
            'ficha_es' => 'required'
        ];
    }
}
