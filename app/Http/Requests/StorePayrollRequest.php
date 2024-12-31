<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePayrollRequest extends FormRequest
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
            'payroll_month' => ['required', 'string', 'regex:/^\d{2}-\d{4}$/', 'size:7'],
            'payroll_day_paid' => ['required', 'date'],
            'payroll_irpef_to_pay' => ['required', 'numeric', 'min:0'],
            'payroll_total_inps' => ['required', 'numeric', 'min:0'],
            'payroll_monthly_basic_deduction' => ['required', 'numeric', 'min:0'],
            'payroll_monthly_family_deduction' => ['required', 'numeric', 'min:0'],
            'payroll_monthly_children_deduction' => ['required', 'numeric', 'min:0'],
            'payroll_monthly_employee_deduction' => ['required', 'numeric', 'min:0'],
            'payroll_total_surcharge' => ['required', 'numeric', 'min:0'],
            'payroll_net_salary' => ['required', 'numeric', 'min:0'],
            'payroll_taxable_irpef' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(){
        return[
            'payroll_month.required' => 'La mensilità è obbligatoria.',
            'payroll_month.string' => 'La mensilità deve essere valida.',
            'payroll_month.regex' => 'La mensilità deve essere nel formato MM-YYYY.',
            'payroll_month.size' => 'La mensilità deve essere lunga 7 caratteri.',

            'payroll_day_paid.required' => 'La data di pagamento è obbligatoria.',
            'payroll_day_paid.date' => 'La data di pagamento deve essere una data valida.',

            'payroll_irpef_to_pay.required' => 'L\'IRPEF da pagare questo mese è obbligatorio.',
            'payroll_irpef_to_pay.numeric' => 'L\'IRPEF da pagare questo mese deve essere un numero.',
            'payroll_irpef_to_pay.min' => 'L\'IRPEF da pagare questo mese deve essere maggiore o uguale a 0.',

            'payroll_total_inps.required' => 'L\'INPS da pagare questo mese è obbligatorio.',
            'payroll_total_inps.numeric' => 'L\'INPS da pagare questo mese deve essere un numero.',
            'payroll_total_inps.min' => 'L\'INPS da pagare questo mese deve essere maggiore o uguale a 0.',

            'payroll_monthly_basic_deduction.required' => 'La detrazione di lavoratore dipendente è obbligatoria.',
            'payroll_monthly_basic_deduction.numeric' => 'La detrazione di lavoratore dipendente deve essere un numero.',
            'payroll_monthly_basic_deduction.min' => 'La detrazione di lavoratore dipendente deve essere maggiore o uguale a 0.',

            'payroll_monthly_family_deduction.required' => 'La detrazione per familiari a carico è obbligatoria.',
            'payroll_monthly_family_deduction.numeric' => 'La detrazione per familiari a carico deve essere un numero.',
            'payroll_monthly_family_deduction.min' => 'La detrazione per familiari a carico deve essere maggiore o uguale a 0.',

            'payroll_monthly_children_deduction.required' => 'La detrazione per figli a carico è obbligatoria.',
            'payroll_monthly_children_deduction.numeric' => 'La detrazione per figli a carico deve essere un numero.',
            'payroll_monthly_children_deduction.min' => 'La detrazione per figli a carico deve essere maggiore o uguale a 0.',

            'payroll_monthly_employee_deduction.required' => 'La detrazione di lavoratore dipendente è obbligatoria.',
            'payroll_monthly_employee_deduction.numeric' => 'La detrazione di lavoratore dipendente deve essere un numero.',
            'payroll_monthly_employee_deduction.min' => 'La detrazione di lavoratore dipendente deve essere maggiore o uguale a 0.',

            'payroll_total_surcharge.required' => 'Le addizionali sono obbligatorie.',
            'payroll_total_surcharge.numeric' => 'Le addizionali devono essere un numero.',
            'payroll_total_surcharge.min' => 'Le addizionali devono essere maggiori o uguali a 0.',

            'payroll_net_salary.required' => 'Lo stipendio netto è obbligatorio.',
            'payroll_net_salary.numeric' => 'Lo stipendio netto deve essere un numero.',
            'payroll_net_salary.min' => 'Lo stipendio netto deve essere maggiore o uguale a 0.',

            'payroll_taxable_irpef.required' => 'L\'imponibile IRPEF è obbligatorio.',
            'payroll_taxable_irpef.numeric' => 'L\'imponibile IRPEF deve essere un numero.',
            'payroll_taxable_irpef.min' => 'L\'imponibile IRPEF deve essere maggiore o uguale a 0.',
        ];
    }
}
