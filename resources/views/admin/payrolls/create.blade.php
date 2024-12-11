@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (request()->has('employee_id') && $selectedEmployee = $employees->firstWhere('id', request()->input('employee_id')))
                    <h1>Compila la busta paga di {{$employees->employee_name}} {{$employees->employee_surname}}</h1>    
                @else
                    <h1>Compila la busta paga </h1>      
                @endif
            </div>
            <div class="col-12">
                {{-- FORM CREATE PER TABELLA PAYROLLS & EXTRAS --}}
                <form action="{{route('admin.payrolls.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- TABELLA PAYROLLS --}}
                    {{-- employee_id --}}
                    @if (request()->has('employee_id') && $selectedEmployee = $employees->firstWhere('id', request()->input('employee_id')))
                        {{-- Se l'employee_id è passato nella query string --}}
                        <input type="hidden" name="employee_id" value="{{ $selectedEmployee->id }}">
                        <input type="text" class="form-control" value="{{ $selectedEmployee->employee_name }} {{ $selectedEmployee->employee_surname }}" disabled>
                    @else
                        {{-- Se l'employee_id non è passato, mostra il select --}}
                        <select name="employee_id" id="employee_id" class="form-control">
                            <option value="">Seleziona un dipendente</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->employee_name }} {{ $employee->employee_surname }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @error('employee_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    {{-- payroll_month --}}
                    <div class="form-group">
                        <label for="payroll_month">Mese</label>
                        <input class="form-control" type="text" name="payroll_month" id="payroll_month" placeholder="MM-YYYY" value="{{old('payroll_month')}}">
                        @error('payroll_month')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- payroll_day_paid --}}
                    <div class="form-group">
                        <label for="payroll_day_paid">Data di pagamento</label>
                        <input type="date" class="form-control" name="payroll_day_paid" id="payroll_day_paid" placeholder="Data di pagamento" value="{{old('payroll_day_paid')}}">
                    </div>
                    {{-- payroll_net_salary --}}
                    {{-- payroll_gross_salary --}}


                    {{-- TABELLA EXTRAS --}}
                    {{-- extra_weekday_overtime_hours --}}
                    <div class="form-group">
                        <label for="extra_weekday_overtime_hours">Ore di straordinario nei giorni feriali</label>
                        <input type="time" class="form-control" name="extra_weekday_overtime_hours" id="extra_weekday_overtime_hours" placeholder="Numero di ore di straordinario nei giorni feriali" value="{{old('extra_weekday_overtime_hours', '00:00')}}">
                        @error('extra_weekday_overtime_hours')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    {{-- extra_weekend_overtime_hours --}}
                    <div class="form-group">
                        <label for="extra_weekend_overtime_hours">Ore di straordinario nel fine settimana</label>
                        <input type="time" class="form-control" name="extra_weekend_overtime_hours" id="extra_weekend_overtime_hours" placeholder="Numero di ore di straordinario nel fine settimana" value="{{old('extra_weekend_overtime_hours', '00:00')}}">
                        @error('extra_weekend_overtime_hours')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- extra_holiday_overtime_hours --}}
                    <div class="form-group">
                        <label for="extra_holiday_overtime_hours">Ore di straordinario nei giorni festivi</label>
                        <input type="time" class="form-control" name="extra_holiday_overtime_hours" id="extra_holiday_overtime_hours" placeholder="Numero di ore di straordinario nei giorni festivi" value="{{old('extra_holiday_overtime_hours', '00:00')}}">
                        @error('extra_holiday_overtime_hours')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- extra_thirteenth_salary --}}
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="extra_thirteenth_salary" id="extra_thirteenth_salary" value="1" 
                        {{ old('extra_thirteenth_salary') ? 'checked' : '' }}>
                        <label class="form-check-label" for="extra_thirteenth_salary">Tredicesima</label>
                        @error('extra_thirteenth_salary')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    {{-- extra_fourteenth_salary --}}
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="extra_fourteenth_salary" id="extra_fourteenth_salary" value="1" 
                        {{ old('extra_fourteenth_salary') ? 'checked' : '' }}>
                        <label class="form-check-label" for="extra_fourteenth_salary">Quattordicesima</label>
                        @error('extra_fourteenth_salary')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- extra_reimbursement_expenses --}}
                    <div class="form-group">
                        <label for="extra_reimbursement_expenses">Rimborso spese</label>
                        <input type="number" class="form-control" step="0.01" min="0" name="extra_reimbursement_expenses" id="extra_reimbursement_expenses" placeholder="Rimborso spese" value="{{old('extra_reimbursement_expenses')}}">
                        @error('extra_reimbursement_expenses')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- bonus_rewards --}}
                    <div class="form-group">
                        <label for="bonus_rewards">Bonus o premi</label>
                        <input class="form-control" type="number" step="0.01" min="0" name="bonus_rewards" id="bonus_rewards" placeholder="Bonus o premi" value="{{old('bonus_rewards')}}">
                        @error('bonus_rewards')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    {{-- payroll_payroll_net_salary --}}
                    <div class="form-group">
                        <label for="payroll_payroll_net_salary">Salario netto (€)</label>
                        <input type="number" id="payroll_net_salary" class="form-control" readonly disabled>
                        <h1 id="payroll_net_salary">{{ old('payroll_net_salary', '€ 0,00') }}</h1>
                    </div>


                    <button type="submit" class="btn btn-primary mt-3">Salva Busta Paga</button>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grossSalary = @json($contract->gross_salary ?? 0); // Salario lordo
            const inpsTax = @json($contract->inps_tax ?? 0); // Tassa INPS
            const municipalTax = @json($contract->municipal_tax ?? 0); // Tassa municipale
            const regionalTax = @json($contract->regional_tax ?? 0); // Tassa regionale
    
            const weekdayOvertimeInput = document.getElementById('extra_weekday_overtime_hours');
            const weekendOvertimeInput = document.getElementById('extra_weekend_overtime_hours');
            const holidayOvertimeInput = document.getElementById('extra_holiday_overtime_hours');
            const thirteenthCheckbox = document.getElementById('extra_thirteenth_salary');
            const fourteenthCheckbox = document.getElementById('extra_fourteenth_salary');
            const reimbursementInput = document.getElementById('extra_reimbursement_expenses');
            const bonusInput = document.getElementById('bonus_rewards');
            const netSalaryInput = document.getElementById('payroll_net_salary');
    
            function calculateNetSalary() {
                // Convert time inputs (HH:MM) to total hours
                const weekdayOvertime = convertTimeToDecimal(weekdayOvertimeInput.value);
                const weekendOvertime = convertTimeToDecimal(weekendOvertimeInput.value);
                const holidayOvertime = convertTimeToDecimal(holidayOvertimeInput.value);
    
                // Calcolo straordinari (esempio: €10/h per feriali, €15/h per weekend, €20/h per festivi)
                const weekdayOvertimePay = weekdayOvertime * 10;
                const weekendOvertimePay = weekendOvertime * 15;
                const holidayOvertimePay = holidayOvertime * 20;
    
                // Rimborso e bonus
                const reimbursement = parseFloat(reimbursementInput.value) || 0;
                const bonus = parseFloat(bonusInput.value) || 0;
    
                // Salario lordo totale (incluso straordinario, tredicesima e quattordicesima)
                let totalGrossSalary = grossSalary + weekdayOvertimePay + weekendOvertimePay + holidayOvertimePay;
                if (thirteenthCheckbox.checked) {
                    totalGrossSalary += grossSalary / 12; // Tredicesima
                }
                if (fourteenthCheckbox.checked) {
                    totalGrossSalary += grossSalary / 12; // Quattordicesima
                }
                totalGrossSalary += reimbursement + bonus;
    
                // Calcolo tasse
                const totalTaxes = (totalGrossSalary * inpsTax / 100) +
                                   (totalGrossSalary * municipalTax / 100) +
                                   (totalGrossSalary * regionalTax / 100);
    
                // Salario netto
                const netSalary = totalGrossSalary - totalTaxes;
    
                // Aggiorna il campo "payroll_net_salary"
                netSalaryInput.value = netSalary.toFixed(2);
            }
    
            function convertTimeToDecimal(time) {
                const [hours, minutes] = time.split(':').map(Number);
                return hours + minutes / 60;
            }
    
            // Event listeners per calcolare dinamicamente il salario netto
            weekdayOvertimeInput.addEventListener('change', calculateNetSalary);
            weekendOvertimeInput.addEventListener('change', calculateNetSalary);
            holidayOvertimeInput.addEventListener('change', calculateNetSalary);
            thirteenthCheckbox.addEventListener('change', calculateNetSalary);
            fourteenthCheckbox.addEventListener('change', calculateNetSalary);
            reimbursementInput.addEventListener('input', calculateNetSalary);
            bonusInput.addEventListener('input', calculateNetSalary);
    
            // Esegui un calcolo iniziale
            calculateNetSalary();
        });
    </script>
    
@endsection