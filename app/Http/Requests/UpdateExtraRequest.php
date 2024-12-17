<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExtraRequest extends FormRequest
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
            'extra_weekday_overtime_hours' => ['nullable', 'regex:/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/'],
            'extra_weekend_overtime_hours' => ['nullable', 'regex:/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/'],
            'extra_holiday_overtime_hours' => ['nullable', 'regex:/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/'],
            'extra_thirteenth_salary' => ['nullable', 'boolean'],
            'extra_fourteenth_salary' => ['nullable', 'boolean'],
            'extra_reimbursement_expenses' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'bonus_rewards' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'extra_notes' => ['nullable', 'string'],
        ];
    }
    public function messages(){
        return[
            'extra_weekday_overtime_hours.regex' => 'Il formato delle ore di straordinario dev essere HH:MM (ore:minuti).',

            'extra_weekend_overtime_hours.regex' => 'Il formato delle ore di straordinario dev essere HH:MM (ore:minuti).',

            'extra_holyday_overtime_hours.regex' => 'Il formato delle ore di straordinario dev essere HH:MM (ore:minuti).',

            'extra_thirteenth_salary.boolean' => 'Spunta l\'opzione se il campo "Tredicesima" è presente.',

            'extra_fourteenth_salary.boolean' => 'Spunta l\'opzione se il campo "Quattordicesima" è presente.',

            'bonus_rewards.numeric' => 'I bonus e i premi devono essere dei numeri validi.', 
            'bonus_rewards.min' => 'I bonus e i premi non possono essere numeri negativi.', 
            'bonus_rewards.max' => 'I numeri e i premi non possono essere superiori a 999999.99.',  

            'extra_notes.string' =>'Le note devono essere un testo valido.';
        ];
    }
}
