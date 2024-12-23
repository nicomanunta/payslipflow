<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractRequest extends FormRequest
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
            'contract_name' => ['required', 'string', 'max:255'],
            'contract_type' => ['required', 'array'],
            'contract_level' => ['string', 'max:50'],
            'contract_gross_monthly_salary' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'contract_week_hours' => ['required', 'numeric', 'min:0', 'max:40'],
            'contract_vacation_days' => ['integer', 'min:0', 'max:365'],
            'contract_inps_tax' => ['numeric', 'min:0', 'max:100'],
            'contract_surcharge_municipal' => ['numeric', 'min:0', 'max:100'],
            'contract_surcharge_regional' => ['numeric', 'min:0', 'max:100'],
            'contract_start_date' => ['required', 'date'],
            'contract_end_date' => ['nullable', 'date'],
        ];
    }

    public function messages(){
        return[
            'contract_name.required' => 'Il nome del contratto è obbligatorio.',
            'contract_name.string' => 'Il nome del contratto deve essere valido.',
            'contract_name.max' => 'Il nome del contratto non può superare i 255 caratteri.',

            'contract_type.required' => 'Il tipo di contratto è obbligatorio.',
            'contract_type.array' => 'Il tipo di contratto deve essere un elenco di valori.',

            'contract_level.string' => 'Il livello del contratto deve essere valido.',
            'contract_level.max' => 'Il livello del contratto non può superare i 50 caratteri.',

            'contract_gross_monthly_salary.required' => 'La rettribuzione mensile lorda è obbligatoria.',
            'contract_gross_monthly_salary.numeric' => 'La retribuzione mensile lorda deve essere un numero valido.',
            'contract_gross_monthly_salary.min' => 'La retribuzione mensile lorda deve essere maggiore o uguale a 0.',
            'contract_gross_monthly_salary.max' => 'La retribuzione mensile lorda non può superare 99.999.999,99€.',

            'contract_week_hours.required' => 'Le ore settimanali sono obbligatorie.',
            'contract_week_hours.numeric' => 'Le ore settimanali devono essere un numero valido.',
            'contract_week_hours.min' => 'Le ore settimanali devono essere maggiori o uguali a 0.',
            'contract_week_hours.max' => 'Le ore settimnali non possono superare 40.',
            
            'contract_vacation_days.integer' => 'Il numero di ferie deve essere intero.',
            'contract_vacation_days.min' => 'Il numero di ferie deve essere maggiore o uguale a 0.',
            'contract_vacation_days.max' => 'Il numero di ferie non può superare 365 giorni.',

            'contract_inps_tax.numeric' => 'L\'aliquota INPS deve essere un numero valido.',
            'contract_inps_tax.min' => 'L\'aliquota INPS deve essere maggiore o uguale a 0.',
            'contract_inps_tax.max' => 'L\'aliquota INPS non può superare il 100%.',

            'contract_surcharge_municipal.numeric' => 'L\'addizionale comunale deve essere un numero valido.',
            'contract_surcharge_municipal.min' => 'L\'addizionale comunale deve essere maggiore o uguale a 0.',
            'contract_surcharge_municipal.max' => 'L\'addizionale comunale non può superare il 100%.',

            'contract_surcharge_regional.numeric' => 'L\'addizionale regionale deve essere un numero valido.',
            'contract_surcharge_regional.min' => 'L\'addizionale regionale deve essere maggiore o uguale a 0.',
            'contract_surcharge_regional.max' => 'L\'addizionale regionale non può superare il 100%.',

            'contract_start_date.required' => 'La data di inizio contratto è obbligatoria.',
            'contract_start_date.date' => 'La data di inizio contratto deve essere una data valida.',

            'contract_end_date.date' => 'La data di fine contratto deve essere una data valida.',
        ];
    }
}
