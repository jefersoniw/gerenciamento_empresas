<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoDocumentoRequest extends FormRequest
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
            'tdo_nom_tipo_documento' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tdo_nom_tipo_documento.required' => 'O Campo Tipo de Documento é obrigatório!'
        ];
    }
}
