<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'end_num_numero' => 'required|numeric',
            'end_nom_complemento' => 'required',
            'end_id_log' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'end_num_numero.required' => 'O Campo Número é obrigatório!',
            'end_num_numero.numeric' => 'O Campo Número aceita somente números!',
            'end_nom_complemento.required' => 'O Campo Complemento é obrigatório!',
            'end_id_log.required' => 'O Campo Logradouro é obrigatório!',
            'end_id_log.numeric' => 'O Campo Logradouro aceita somente números!'
        ];
    }
}
