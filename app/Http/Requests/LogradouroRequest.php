<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogradouroRequest extends FormRequest
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
            'log_nom_logradouro' => 'required',
            'log_num_cep' => 'required',
            'log_id_bai' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'log_nom_logradouro.required' => 'O Campo Logradouro é obrigatório!',
            'log_num_cep.required' => 'O Campo CEP é obrigatório!',
            'log_id_bai.required' => 'O Campo Bairro é obrigatório!'
        ];
    }
}
