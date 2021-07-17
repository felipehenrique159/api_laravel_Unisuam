<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ValidarStatusRequest extends FormRequest
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
            'status_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'status_id.required' => 'id do status é obrigatório!',
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
