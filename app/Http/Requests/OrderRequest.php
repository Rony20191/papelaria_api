<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'codigo_cliente' => 'required|integer|exists:App\Models\Client,id',
            'codigo_produto' => 'required|integer|exists:App\Models\Product,id',
            'data_criacao'   => 'required|date|date_format:Y-m-d'
        ];
    }
}
