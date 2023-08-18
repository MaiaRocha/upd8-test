<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditClientRequest extends FormRequest
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
            'cpf'           => 'sometimes',
            'name'          => 'sometimes',
            'date_of_birth' => 'sometimes|date',
            'gender'        => 'sometimes|in:F,M',
            'address'       => 'sometimes|nullable',
            'state'         => 'sometimes|nullable',
            'city'          => 'sometimes|nullable',
        ];
    }
}
