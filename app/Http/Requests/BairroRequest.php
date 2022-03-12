<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BairroRequest extends FormRequest
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
            'bai_nom_bairro' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'bai_nom_bairro.required' => 'O Campo Bairro é obrigatório!'
        ];
    }
}
