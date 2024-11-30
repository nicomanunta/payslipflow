<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateEmployeeRequest extends FormRequest
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
            'employee_name' => ['required', 'string', 'max:100'],
            'employee_surname' => ['required', 'string', 'max:100'],
            'employee_email' => ['required', 'string', 'email', 'max:100', Rule::unique('employees')->ignore($this->route('employee'))],
            'employee_phone' => ['required', new Phone('AUTO'), 'max:20', Rule::unique('employees')->ignore($this->route('employee'))],
            'employee_state' => ['nullable', 'string', 'max:50'],
            'employee_region' => ['nullable', 'string', 'max:50'],
            'employee_city' => ['nullable', 'string', 'max:50'],
            'employee_birth_date' => ['required', 'date'],
            'employee_role' => ['required', 'string', 'max:150'],
            'employee_status' => ['required', 'in:Attivo,Sospeso,In prova,Licenziato,Pensione'],
            'employee_hiring_date' => ['required', 'date'],
            'employee_img' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],    
        ];
    }



    public function messages(){
        return[
            'employee_name.required' => 'Il nome è obbligatorio.',
            'employee_name.string' => 'Il nome deve essere valido.',
            'employee_name.max' => 'Il nome non può superare i 100 caratteri.',

            'employee_surname.required' => 'Il cognome è obbligatorio.',
            'employee_surname.string' => 'Il cognome deve essere valido.',
            'employee_surname.max' => 'Il cognome non può superare i 100 caratteri.',

            'employee_email.required' => 'L\'email è obbligatoria.',
            'employee_email.email' => 'L\'email deve essere un indirizzo valido.',
            'employee_email.max' => 'L\'email non può superare i 100 caratteri.',
            'employee_email.unique' => 'Questa email è già registrata.',

            'employee_phone.required' => 'Il numero di telefono è obbligatorio.',
            'employee_phone.phone' => 'Il numero di telefono deve essere valido.',
            'employee_phone.max' => 'Il numero di telefono non può superare i 20 caratteri.',
            'employee_phone.unique' => 'Questo numero di telefono è già registrato.',

            'employee_state.max' => 'Lo Stato di residenza non può superare i 50 caratteri.',
            'employee_region.max' => 'La Regione di residenza non può superare i 50 caratteri.',
            'employee_city.max' => 'Il Comune di residenza non può superare i 50 caratteri.',

            'employee_birth_date.required' => 'La data di nascita è obbligatoria.',
            'employee_birth_date.date' => 'La data di nascita deve essere una data valida.',

            'employee_role.required' => 'Il ruolo è obbligatorio.',
            'employee_role.string' => 'Il ruolo deve essere valido.',
            'employee_role.max' => 'Il ruolo non può superare i 150 caratteri.',

            'employee_status.required' => 'Lo status lavorativo è obbligatorio.',
            'employee_status.in' => 'Lo status lavorativo deve essere uno dei seguenti: Attivo, Sospeso, In prova, Licenziato, Pensione.',

            'employee_hiring_date.required' => 'La data di assunzione è obbligatoria.',
            'employee_hiring_date.date' => 'La data di assunzione deve essere una data valida.',

            'employee_img.image' => 'L\'immagine deve essere un file immagine valido.',
            'employee_img.mimes' => 'L\'immagine deve essere un file con formato: jpeg, png o jpg.',
            'employee_img.max' => 'L\'immagine non può superare i 2 MB.',  
        ];
    }
}
