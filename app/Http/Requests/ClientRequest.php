<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'nome'             => 'required|string|min:3|max:255',
            'email'            => 'required|email|string|min:3|max:255|unique:App\Models\Client,email',
            'telefone'         => 'required|string|min:9|max:12|celular_com_ddd',
            'data_nascimento'  => 'required|date|date_format:Y-m-dbefore:2020-12-31',
            'endereco'         => 'required|string|min:3|max:255',
            'complemento'      => 'required|string|min:3|max:255',
            'bairro'           => 'required|string|min:3|max:255',
            'cep'              => 'required|string|min:9|max:9|formato_cep',
            'data_cadastro'    => 'required|date|date_format:Y-m-d'
        ];
    }
}
