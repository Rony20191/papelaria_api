<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ClientRequest extends BaseRequest
{

    public function rules()
    {


        $regras = [
            'nome'             => 'required|string|min:3|max:255',
            'email'            => ["required","email","string","min:3","max:255",Rule::unique('clients')->ignore($this->id)],
            'telefone'         => 'required|string|min:9|max:14|celular_com_ddd',
            'data_nascimento'  => 'required|date|date_format:Y-m-d',
            'endereco'         => 'required|string|min:3|max:255',
            'complemento'      => 'required|string|min:3|max:255',
            'bairro'           => 'required|string|min:3|max:255',
            'cep'              => 'required|string|min:9|max:9|formato_cep',
            'data_cadastro'    => 'required|date|date_format:Y-m-d'
        ];

        return $regras;

    }
}
