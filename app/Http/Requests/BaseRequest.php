<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json([
                'data' => [],
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'messagem' => "",
                'errors' => $errors
            ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
