<?php

namespace Src\admin\user\infrastructure\validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|integer',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|min:3',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
