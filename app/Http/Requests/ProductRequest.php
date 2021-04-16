<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends BaseRequest
{

    public function rules()
    {

        return [
            'nome'  => 'required|string|min:3|max:255',
            'preco' => 'required|numeric|min:0|not_in:0',
            'foto'  => 'required|file|max:5000|mimes:jpeg,png'
        ];
    }
}
