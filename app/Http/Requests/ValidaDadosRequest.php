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
            'email' => 'required|email:rfc,dns|max:45',
            'nome' => 'required|string|max:45',
            'telefone' => 'required|string|max:45',
            'cpf' => 'required|cpf|unique:App\Models\Indicacoes,cpf|max:11',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'E-mail é obrigatório!',
            'email.email' => 'E-mail informado não é válido!',
            'nome.required' => 'Nome é obrigatório!',
            'nome.max' => 'Nome deve ter no maximo 45 caracteres!',
            'telefone.max' => 'Telefone deve ter no maximo 45 caracteres!',
            'email.max' => 'E-mail deve ter no maximo 45 caracteres!',
            'cpf.required' => 'Cpf é obrigatório!',
            'cpf.unique' => "Cpf já cadastrado",
            'cpf.cpf' => "Cpf informado não é válido!",
            'cpf.max' => "Cpf não deve conter caracteres especiais!, deve conter apenas 11 dígitos"
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
