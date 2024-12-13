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
                        
                    </div>


                    <button type="submit" class="btn btn-primary mt-3">Salva Busta Paga</button>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grossSalary = parseFloat(@json($contract->contract_gross_monthly_salary ?? 0)); // Salario lordo
            const weeklyHours = parseFloat(@json($contract->contract_week_hours ?? 0)); // Ore settimanali
            const inpsTax = parseFloat(@json($contract->contract_inps_tax ?? 0)); // Tassa INPS
            const municipalTax = parseFloat(@json($contract->contract_surcharge_municipal ?? 0)); // Tassa municipale
            const regionalTax = parseFloat(@json($contract->contract_surcharge_regional ?? 0)); // Tassa regionale
            const dependentFamily = parseFloat(@json($deduction->deduction_family_members ?? 0)); // familiari a carico 
            const dependentChildren = parseFloat(@json($deduction->deduction_children_members ?? 0)); // figli a carico

            // calcolo ore mensili e paga oraria
            const totalWorkingHoursInMonth = weeklyHours * 4.33; 
            const hourlyRate = grossSalary / totalWorkingHoursInMonth; 
    
            const weekdayOvertimeInput = document.getElementById('extra_weekday_overtime_hours');
            const weekendOvertimeInput = document.getElementById('extra_weekend_overtime_hours');
            const holidayOvertimeInput = document.getElementById('extra_holiday_overtime_hours');
            const thirteenthCheckbox = document.getElementById('extra_thirteenth_salary');
            const fourteenthCheckbox = document.getElementById('extra_fourteenth_salary');
            const reimbursementInput = document.getElementById('extra_reimbursement_expenses');
            const bonusInput = document.getElementById('bonus_rewards');
            const netSalaryInput = document.getElementById('payroll_net_salary');
    
            function calculateNetSalary() {
                // convert time inputs (HH:MM) to total hours
                const weekdayOvertime = convertTimeToDecimal(weekdayOvertimeInput.value);
                const weekendOvertime = convertTimeToDecimal(weekendOvertimeInput.value);
                const holidayOvertime = convertTimeToDecimal(holidayOvertimeInput.value);
    
                // calcolo straordinari (esempio: €10/h per feriali, €15/h per weekend, €20/h per festivi)
                const weekdayOvertimePay = weekdayOvertime * (hourlyRate * 1.25);
                const weekendOvertimePay = weekendOvertime * (hourlyRate * 1.50);
                const holidayOvertimePay = holidayOvertime * (hourlyRate * 2);
    
                // rimborso e bonus
                const reimbursement = parseFloat(reimbursementInput.value) || 0;
                const bonus = parseFloat(bonusInput.value) || 0;
    
                // salario lordo totale (incluso straordinario, tredicesima e quattordicesima)
                let totalGrossSalary = grossSalary + weekdayOvertimePay + weekendOvertimePay + holidayOvertimePay;
                if (thirteenthCheckbox.checked) {
                    totalGrossSalary += grossSalary ; // Tredicesima
                }
                if (fourteenthCheckbox.checked) {
                    totalGrossSalary += grossSalary; // Quattordicesima
                }
                totalGrossSalary += bonus;
    
                // calcolo inps
                const totalINPS = totalGrossSalary * inpsTax / 100;

                // imponibile IRPEF 
                const taxableIRPEF = (totalGrossSalary - totalINPS) * 12;
                
                // calcolo irpef
                let totalIrpef = 0;

                if (taxableIRPEF <= 28000) {
                    // primo scaglione
                    totalIrpef = taxableIRPEF * 23 / 100;

                } else if( taxableIRPEF <= 50000) {
                    // secondo scaglione
                    totalIrpef = 6440 + ((taxableIRPEF - 28000) * 35 / 100);

                } else {
                    // terzo scaglione
                    totalIrpef = 14140 + ((taxableIRPEF - 50000) * 43 / 100);

                }

                // calcolo detrazioni base
                let basicDeduction = 0

                if (taxableIRPEF <= 15000) {

                    basicDeduction = 1955;

                } else if(taxableIRPEF <= 28000) {
                    
                    basicDeduction = 1910 + 1190 * ((28000 - taxableIRPEF)/13000);

                } else if(taxableIRPEF <= 50000) {

                    basicDeduction = 1910 * ((50000 - taxableIRPEF) / 22000);

                } else {
                    basicDeduction = 0;
                }

                // calcolo detrazioni per familiari 
                let familyDeduction = (750 * ((80000 - taxableIRPEF)/80000)) * dependentFamily;

                // calcolo detrazioni per figli
                let childrenDeduction = 0; 
                if (dependentChildren > 0) {
                    
                    childrenDeduction = (950 + (950 * (dependentChildren - 1))) * ((95000 + (15000 * (dependentChildren - 1)) - taxableIRPEF)/(95000 + (15000 * (dependentChildren - 1))));

                } 

                // detrazione totali
                let totalDeduction = basicDeduction + familyDeduction + childrenDeduction;

                //irpef finale da pagare
                let irpefToPay = totalIrpef - totalDeduction;

                // CALCOLARE ADDIZIONALI REGIONALI E COMUNALI SUUL'IMPONIBILE IRPEF GIA RECUPERATI ALL'INIZIO DELLA FUNZIONE
               



                



                // CALCOLO FINALE -> DA taxableIrpef TOGLIERE: irpefToPay, ADDIZIONALI REGIONALI E COMUNALI, DIVIDERE IL TUTTO PER 12 E SI OTTIENE IL NETTO MENSILE
                // salario netto
                const netSalary = taxableIRPEF - irpefToPay -   + reimbursement;
    
                // aggiorna il campo "payroll_net_salary"
                netSalaryInput.value = netSalary.toFixed(2);
            }
    
            function convertTimeToDecimal(time) {
                const [hours, minutes] = time.split(':').map(Number);
                return hours + minutes / 60;
            }
    
            // event listeners per calcolare dinamicamente il salario netto
            weekdayOvertimeInput.addEventListener('change', calculateNetSalary);
            weekendOvertimeInput.addEventListener('change', calculateNetSalary);
            holidayOvertimeInput.addEventListener('change', calculateNetSalary);
            thirteenthCheckbox.addEventListener('change', calculateNetSalary);
            fourteenthCheckbox.addEventListener('change', calculateNetSalary);
            reimbursementInput.addEventListener('input', calculateNetSalary);
            bonusInput.addEventListener('input', calculateNetSalary);
    
            // esegui un calcolo iniziale
            calculateNetSalary();
        });
    </script>
    
@endsection