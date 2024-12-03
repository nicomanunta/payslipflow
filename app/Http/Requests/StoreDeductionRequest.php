<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeductionRequest extends FormRequest
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
            'dependent_family_members' => ['nullable', 'integer', 'min:0', 'max:100'],
            'dependent_children_under_24' => ['nullable', 'integer', 'min:0', 'max:100'],
            'dependent_children_over_24' => ['nullable', 'integer', 'min:0', 'max:100'],
            'dependent_children_with_disabilities' => ['nullable', 'integer', 'min:0', 'max:100'],
        ];
    }

    public function messages(){
        return[
            'dependent_family_members.integr' => 'Il numero dei familiari a carico deve essere un numero intero.',
            'dependent_family_members.min' => 'Il numero dei familiari a carico non può essere negativo.',
            'dependent_family_members.max' => 'Il numero dei familiari a carico non può essere superiore a 100.',

            'dependent_children_under_24.integer' => 'Il numero dei figli a carico under 24 deve essere un numero intero.',
            'dependent_children_under_24.min' => 'Il numero dei figli a carico under 24 non può essere negativo.',
            'dependent_children_under_24.max' => 'Il numero dei figli a carico under 24 non può essere superiore a 100.',

            'dependent_children_over_24.integer' => 'Il numero dei figli a carico over 24 deve essere un numero intero.',
            'dependent_children_over_24.min' => 'Il numero dei figli a carico over 24 non può essere negativo.',
            'dependent_children_over_24.max' => 'Il numero dei figli a carico over 24 non può essere superiore a 100.',

            'dependent_children_with_disabilities.integer' => 'Il numero dei figli a carico con disabilità deve essere un numero intero.',
            'dependent_children_with_disabilities.min' => 'Il numero dei figli a carico con disabilità non può essere negativo.',
            'dependent_children_with_disabilities.max' => 'Il numero dei figli a carico con disabilità non può essere superiore a 100.',

        ];
    }
}
