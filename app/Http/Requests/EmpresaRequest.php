<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'emp_nom_empresa' => 'required',
            'emp_dti_atividade' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'emp_nom_empresa.required' => 'O Campo Nome da Empresa é um campo obrigatório!',
            'emp_dti_atividade.required' => 'O Campo data inicial de atividade é um campo obrigatório!'
        ];
    }
}
