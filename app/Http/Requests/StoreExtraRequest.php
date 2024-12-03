<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExtraRequest extends FormRequest
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
        ];
    }
    public function messages(){
        return[

        ]
    }
}
