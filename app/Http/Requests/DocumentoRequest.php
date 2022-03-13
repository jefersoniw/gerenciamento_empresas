<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
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
            'doc_num_documento' => 'required',
            'doc_dat_cadastro' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'doc_num_documento.required' => 'O Campo Número do Documento é obrigatório!',
            'doc_dat_cadastro.required' => 'O Campo Data do Documento e obrigatório!'
        ];
    }
}
