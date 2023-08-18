<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => 'required|unique:clients',
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:F,M',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está em uso.',
            'name.required' => 'O nome é obrigatório.',
            'date_of_birth.required' => 'A data de nascimento é obrigatória.',
            'date_of_birth.date' => 'A data de nascimento deve ser uma data válida.',
            'gender.required' => 'O gênero é obrigatório.',
            'gender.in' => 'O gênero deve ser "feminino" ou "masculino".',
            'address.required' => 'O endereço é obrigatório.',
            'state.required' => 'O Estado é obrigatório.',
            'city.required' => 'A cidade é obrigatória.',
        ];
    }
}
