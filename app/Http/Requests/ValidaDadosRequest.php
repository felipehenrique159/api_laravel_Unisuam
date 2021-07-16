<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ValidaDadosRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns',
            'nome' => 'required|string|max:50',
            'cpf' => 'required|cpf|unique:App\Models\Indicacoes,cpf',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Email é obrigatório!',
            'email.email' => 'Email informado não é válido!',
            'nome.required' => 'Nome é obrigatório!',
            'cpf.required' => 'Cpf é obrigatório!',
            'cpf.unique' => "Cpf já cadastrado",
            'cpf.cpf' => "Cpf informado não é válido!",

        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse([
            'result' => 'Error',
            'message' => 'Dados Inválidos',
            'errors' => $validator->errors()
            
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

}
