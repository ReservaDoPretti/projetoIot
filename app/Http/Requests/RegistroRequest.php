<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required',
            'valor' => 'required',
            'unidade' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if($this->expectsJson()){
            throw new HttpResponseException(response()->json([
                'succes' => false,
                'message' => 'Erro de Validação',
                'errors' => $validator->errors()
            ],422));
        }

        // Se for Livewire, lança uma exceção padrão do Laravel
        throw new ValidationException($validator);
    }

    public function messages(){
        return [
            'codigo.required' => 'O código do sensor é obrigatório',
            'valor.required' => 'O valor do sensor é obrigatório',
            'valor.numeric' => 'O valor do sensor precisa ser numerico',
            'unidade.required' => 'A unidade de medida é obrigatório',
        ];
    }
}
