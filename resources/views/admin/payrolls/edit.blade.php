<x-app-layout>
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 my-4">            
                <h1 class="text-uppercase montserrat-bold dark-grey text-shadow-grey text-center ">Modifica la busta paga di "{{$employee->employee_name}} {{$employee->employee_surname}}"</h1>
            </div>
            <div class="col-12">
                {{-- FORM CREATE PER TABELLA PAYROLLS & EXTRAS --}}
                <form action="{{route('admin.payrolls.update', ['payroll' => $payroll->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- DATI --}}
                    <div class="row bg-white mx-3 section-create-payroll">
                        <h2 class="mb-3 poppins-medium steel-blue text-shadow-blue text-uppercase">inserimento dati</h2>
                        <div class="col-6 d-flex flex-column">
                            
                            {{-- employee_id --}}
                            <div class="form-group mb-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue " for="employee_name">Nome e Cognome</label>
                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                <input type="text" class="roboto-regular medium-grey form-control border-steel-blue long-input" value="{{ $employee->employee_name }} {{ $employee->employee_surname }}" disabled>
                                @error('employee_id')
                                    <div class="text-danger">{{ $message }}</div>€
                                @enderror
                            </div>

                            {{-- payroll_month --}}
                            <div class="form-group my-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="payroll_month">Mese</label>
                                <input class="form-control roboto-regular medium-grey border-steel-blue long-input" type="text" name="payroll_month" id="payroll_month" placeholder="MM-YYYY" value="{{old('payroll_month', $payroll->payroll_month)}}">
                                @error('payroll_month')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            {{-- payroll_day_paid --}}
                            <div class="form-group my-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="payroll_day_paid">Data di pagamento</label>
                                <input type="date" class="form-control roboto-regular medium-grey border-steel-blue long-input" name="payroll_day_paid" id="payroll_day_paid" placeholder="Data di pagamento" value="{{old('payroll_day_paid', $payroll->payroll_day_paid)}}">
                                @error('payroll_day_paid')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            {{-- extra_notes --}}
                            <div class="form-group my-3 d-flex flex-column flex-grow-1">
                                <label class="my-1 fw-bold roboto-regular medium-grey text-shadow-blue" for="extra_notes">Note</label>
                                <textarea  name="extra_notes" id="extra_notes" class="form-control roboto-regular medium-grey border-steel-blue long-input flex-grow-1" placeholder="Inserisci qui eventuali note" >{{ old('extra_notes', $extra->extra_notes)}}</textarea>
                                @error('extra_notes')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-6">

                            {{-- extra_weekday_overtime_hours --}}
                            <div class="form-group mb-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="extra_weekday_overtime_hours">Ore di straordinario nei giorni feriali</label>
                                <input type="time" class="form-control roboto-regular medium-grey border-steel-blue long-input" name="extra_weekday_overtime_hours" id="extra_weekday_overtime_hours" placeholder="Numero di ore di straordinario nei giorni feriali" value="{{old('extra_weekday_overtime_hours', $extra->extra_weekday_overtime_hours ?? '00:00')}}">
                                @error('extra_weekday_overtime_hours')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            
                            {{-- extra_weekend_overtime_hours --}}
                            <div class="form-group my-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="extra_weekend_overtime_hours">Ore di straordinario nel fine settimana</label>
                                <input type="time" class="form-control roboto-regular medium-grey border-steel-blue long-input" name="extra_weekend_overtime_hours" id="extra_weekend_overtime_hours" placeholder="Numero di ore di straordinario nel fine settimana" value="{{old('extra_weekend_overtime_hours', $extra->extra_weekend_overtime_hours ?? '00:00')}}">
                                @error('extra_weekend_overtime_hours')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
        
                            {{-- extra_holiday_overtime_hours --}}
                            <div class="form-group my-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="extra_holiday_overtime_hours">Ore di straordinario nei giorni festivi</label>
                                <input type="time" class="form-control roboto-regular medium-grey border-steel-blue long-input" name="extra_holiday_overtime_hours" id="extra_holiday_overtime_hours" placeholder="Numero di ore di straordinario nei giorni festivi" value="{{old('extra_holiday_overtime_hours', $extra->extra_holiday_overtime_hours ?? '00:00')}}">
                                @error('extra_holiday_overtime_hours')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
        
                            {{-- extra_thirteenth_salary --}}
                            <div class="form-group my-3 form-check">
                                <input type="checkbox" class="form-check-input roboto-regular medium-grey" name="extra_thirteenth_salary" id="extra_thirteenth_salary" value="1" 
                                {{ old('extra_thirteenth_salary', $extra->extra_thirteenth_salary) ? 'checked' : '' }}>
                                <label class="form-check-label roboto-regular medium-grey text-shadow-blue" for="extra_thirteenth_salary">Tredicesima</label>
                                @error('extra_thirteenth_salary')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            
                            {{-- extra_fourteenth_salary --}}
                            <div class="form-group my-3 form-check">
                                <input type="checkbox" class="form-check-input roboto-regular medium-grey" name="extra_fourteenth_salary" id="extra_fourteenth_salary" value="1" 
                                {{ old('extra_fourteenth_salary', $extra->extra_fourteenth_salary) ? 'checked' : '' }}>
                                <label class="form-check-label roboto-regular medium-grey text-shadow-blue" for="extra_fourteenth_salary">Quattordicesima</label>
                                @error('extra_fourteenth_salary')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
        
                            {{-- extra_reimbursement_expenses --}}
                            <div class="form-group my-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="extra_reimbursement_expenses">Rimborso spese</label>
                                <input type="number" class="form-control roboto-regular medium-grey border-steel-blue long-input" step="0.01" min="0" name="extra_reimbursement_expenses" id="extra_reimbursement_expenses" placeholder="Rimborso spese" value="{{old('extra_reimbursement_expenses', $extra->extra_reimbursement_expenses)}}">
                                @error('extra_reimbursement_expenses')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
        
                            {{-- extra_bonus_rewards --}}
                            <div class="form-group my-3">
                                <label class="my-1 roboto-regular medium-grey text-shadow-blue" for="extra_bonus_rewards">Bonus o premi</label>
                                <input class="form-control roboto-regular medium-grey border-steel-blue long-input" type="number" step="0.01" min="0" name="extra_bonus_rewards" id="extra_bonus_rewards" placeholder="Bonus o premi" value="{{old('extra_bonus_rewards', $extra->extra_bonus_rewards)}}">
                                @error('extra_bonus_rewards')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- CALCOLO --}}
                    <div class="row bg-white mx-3 mt-4 section-create-payroll">
                        <h2 class="mb-3 poppins-medium steel-blue text-shadow-blue text-uppercase">Calcolo</h2>
                        <div class="col-6">

                            {{-- payroll_monthly_basic_deduction --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_monthly_basic_deduction">Detrazioni lavoratore dipendente per questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_monthly_basic_deduction" name="payroll_monthly_basic_deduction" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_monthly_basic_deduction')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>

                            {{-- payroll_monthly_family_deduction --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_monthly_family_deduction">Detrazioni familiari a carico per questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_monthly_family_deduction" name="payroll_monthly_family_deduction" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_monthly_family_deduction')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>
        
                            {{-- payroll_monthly_children_deduction --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_monthly_children_deduction">Detrazioni figli a carico per questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_monthly_children_deduction" name="payroll_monthly_children_deduction" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_monthly_children_deduction')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>
        
                            {{-- payroll_monthly_employee_deduction --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_monthly_employee_deduction">Detrazioni totali per questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_monthly_employee_deduction" name="payroll_monthly_employee_deduction" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_monthly_employee_deduction')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>


                        </div>
                        <div class="col-6">

                            {{-- payroll_total_inps --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_total_inps">INPS da pagare questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_total_inps" name="payroll_total_inps" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_total_inps')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>

                            {{-- payroll_total_surcharge --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_total_surcharge">Addizionali totali &#40;regionali + comunali&#41;:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_total_surcharge" name="payroll_total_surcharge" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_total_surcharge')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>

                            {{-- payroll_taxable_irpef --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_taxable_irpef">Imponibile IRPEF annuale per questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_taxable_irpef" name="payroll_taxable_irpef" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_taxable_irpef')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>
        
                            {{-- payroll_irpef_to_pay --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_irpef_to_pay">IRPEF finale da pagare questo mese:</label>
                                <div class="fs-5">
                                    <span class="roboto-regular medium-grey">&euro;</span>
                                    <input type="number" id="payroll_irpef_to_pay" name="payroll_irpef_to_pay" class="fs-5 ps-0 roboto-regular medium-grey input-number d-inline-block" readonly>    
                                </div>
                                @error('payroll_irpef_to_pay')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>
                            
                            <hr>
                            {{-- payroll_net_salary --}}
                            <div class="form-group my-3">
                                <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="payroll_net_salary">Salario netto:</label>
                                <div class="fs-2">
                                    <span class="roboto-regular medium-grey text-shadow-grey">&euro;</span>
                                    <input type="number" id="payroll_net_salary" name="payroll_net_salary" class="fw-bold fs-2 ps-0 input-number  d-inline-block roboto-regular medium-grey" readonly >  
                                </div>
                                @error('payroll_net_salary')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror 
                            </div>
                        </div>
                    </div>
                    <div class="text-end me-5  my-5"> 
                        <button class="btn-save montserrat-bold text-white text-uppercase" type="submit">Salva busta paga</button>
                    </div>

                </form>
            </div>
        </div>
        <img class="logo-payslipflow-dashboard position-absolute" src="{{URL::asset('/img/logo-scritta-sfondo-bianco.jpeg')}}" alt="">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grossSalary = parseFloat(@json($contract->contract_gross_monthly_salary ?? 0)); // Salario lordo
            const weeklyHours = parseFloat(@json($contract->contract_week_hours ?? 0)); // Ore settimanali
            const municipalTax = parseFloat(@json($contract->contract_surcharge_municipal ?? 0)); // Tassa municipale
            const regionalTax = parseFloat(@json($contract->contract_surcharge_regional ?? 0)); // Tassa regionale
            const contractStartDate = @json($contract->contract_start_date ?? 0); // data di assunzione
            const dependentFamily = parseFloat(@json($deduction->dependent_family_members ?? 0)); // familiari a carico 
            const dependentChildren = parseFloat(@json($deduction->dependent_children_members ?? 0)); // figli a carico
           
            // calcolo ore mensili e paga oraria
            const totalWorkingHoursInMonth = weeklyHours * 4.33; 
            const hourlyRate = grossSalary / totalWorkingHoursInMonth; 
    
            const weekdayOvertimeInput = document.getElementById('extra_weekday_overtime_hours');
            const weekendOvertimeInput = document.getElementById('extra_weekend_overtime_hours');
            const holidayOvertimeInput = document.getElementById('extra_holiday_overtime_hours');
            const thirteenthCheckbox = document.getElementById('extra_thirteenth_salary');
            const fourteenthCheckbox = document.getElementById('extra_fourteenth_salary');
            const reimbursementInput = document.getElementById('extra_reimbursement_expenses');
            const bonusInput = document.getElementById('extra_bonus_rewards');
            const basicDeductionInput = document.getElementById('payroll_monthly_basic_deduction');
            const familyDeductionInput = document.getElementById('payroll_monthly_family_deduction');
            const childrenDeductionInput = document.getElementById('payroll_monthly_children_deduction');
            const employeeDeductionInput = document.getElementById('payroll_monthly_employee_deduction');
            const totalSurchargeInput = document.getElementById('payroll_total_surcharge');
            const totalInpsInput = document.getElementById('payroll_total_inps');
            const irpefToPayInput = document.getElementById('payroll_irpef_to_pay');
            const grossSalaryInput = document.getElementById('payroll_taxable_irpef');
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
                console.log('Straordinari nei giorni FERIALI €' + weekdayOvertimePay);
                console.log('Straordinari nei giorni WEEKEND €' + weekendOvertimePay);
                console.log('Straordinari nei giorni FESTIVI €' + holidayOvertimePay);
    
                // rimborso e bonus
                const reimbursement = parseFloat(reimbursementInput.value) || 0;
                const bonus = parseFloat(bonusInput.value) || 0;
                console.log('Bonus €'+ bonus);

                
                // salario lordo totale (incluso straordinario, tredicesima e quattordicesima)
                let totalGrossSalary = grossSalary + weekdayOvertimePay + weekendOvertimePay + holidayOvertimePay;


                // CALCOLO TREDICESIMA e QUATTORDICESIMA
                let currentDate = new Date();
                let contractStartDateObj = new Date(contractStartDate);
                console.log('Data di oggi ' + currentDate);
                console.log('Data di assunzione ' + contractStartDateObj);


                let monthsWorked = (currentDate.getFullYear() - contractStartDateObj.getFullYear()) * 12;
                monthsWorked += currentDate.getMonth() - contractStartDateObj.getMonth();

                console.log('Numero di mesi di assunzione ' + monthsWorked);


                if (thirteenthCheckbox.checked) {
                    if (monthsWorked >= 12) {
                        // Se il dipendente ha lavorato per almeno 12 mesi, assegna la tredicesima completa
                        totalGrossSalary += grossSalary;
                    } else {
                        // Se il dipendente ha lavorato meno di 12 mesi, calcola la parte proporzionale
                        let thirteenthPart = grossSalary * (monthsWorked / 12);
                        totalGrossSalary += thirteenthPart;
                        console.log('Tredicesima ' + thirteenthPart);
                        
                    }
                }
                if (fourteenthCheckbox.checked) {
                    if (monthsWorked >= 12) {
                        // Se il dipendente ha lavorato per almeno 12 mesi, assegna la tredicesima completa
                        totalGrossSalary += grossSalary;
                    } else {
                        // Se il dipendente ha lavorato meno di 12 mesi, calcola la parte proporzionale
                        let thirteenthPart = grossSalary * (monthsWorked / 12);
                        totalGrossSalary += thirteenthPart;
                    }
                }

                totalGrossSalary += bonus;
                console.log('Salario lordo €' + totalGrossSalary);

    
                // calcolo inps
                const inpsTax = 9.19;
                const totalINPS = totalGrossSalary * inpsTax / 100;
                
                console.log('Tassa inps €' + totalINPS );


                // inizializza imponibile IRPEF annuale
                let taxableIRPEF = 0;
                let savedPayrolls = @json($payrolls); // buste salvate
                console.log('b'+ savedPayrolls.length);

                // Filtra le buste paghe per escludere quella che stai modificando (usando l'ID, ad esempio)
                savedPayrolls = savedPayrolls.filter(payroll => payroll.id !== {{$payroll->id}});

                // Ottieni la data della busta paga che stai modificando
                const currentPayrollDate = new Date("{{$payroll->payroll_day_paid}}"); // Assicurati che payroll_day_paid sia presente e correttamente formattato

                // Filtra anche le buste paghe future, ovvero quelle che hanno una data successiva alla busta che stai modificando
                savedPayrolls = savedPayrolls.filter(payroll => new Date(payroll.payroll_day_paid) < currentPayrollDate);

                const payrollCount = savedPayrolls.length; // numero di buste salvate
                console.log('numero di buste paga ' + payrollCount);


                // caso 1: prima busta paga
                if (payrollCount === 0) { 
                    taxableIRPEF = (parseFloat(totalGrossSalary) - parseFloat(totalINPS)) * 12; // basato solo sulla prima busta paga
                }
                // caso 2: almeno una busta paga esistente
                else if (payrollCount > 0 && payrollCount < 11) {
                    // recupera gli imponibili mensili delle buste paghe salvate
                    let totalGrossFromPayrolls = 0;
                    savedPayrolls.forEach(payroll => {
                        totalGrossFromPayrolls += parseFloat(payroll.payroll_taxable_irpef) / 12;
                        console.log('Imponibili irpef presenti nel DB €' + payroll.payroll_taxable_irpef);
                        console.log('Imponibile irpef di questo mese è di €' + totalGrossFromPayrolls);
                    });

                    // calcola la media degli imponibili mensili (esistenti + corrente)
                    const averageMonthlyGross = (totalGrossFromPayrolls + parseFloat(totalGrossSalary) - parseFloat(totalINPS)) / (payrollCount + 1);
                    console.log('Media imponibile ' + averageMonthlyGross);
                    taxableIRPEF = averageMonthlyGross * 12; // Ottieni imponibile annuale
                    console.log('Imponibile annuale per questo mese ' + taxableIRPEF);

                }
                // caso 3: 12 o più buste paghe esistenti
                else {
                    // recupera gli ultimi 11 imponibili mensili delle buste paghe salvate
                    let totalGrossFromLast11Payrolls = 0;
                    const last11Payrolls = savedPayrolls.slice(-11); // ultimi 11 record
                    console.log('Elenco ultime 11 buste paga ' + last11Payrolls);
                    last11Payrolls.forEach(payroll => {
                        totalGrossFromLast11Payrolls += parseFloat(payroll.payroll_taxable_irpef) / 12;
                        console.log('Ultimi 11 imponibili mensili nelle buste paga €' + totalGrossFromLast11Payrolls);

                    });

                    // aggiungi l'imponibile mensile attuale
                    taxableIRPEF = (totalGrossFromLast11Payrolls + (parseFloat(totalGrossSalary) - parseFloat(totalINPS)));
                }

                console.log('Imponibile irpef annuale in questo mese è di €' + taxableIRPEF);

                
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
                console.log('Irpef annuale da pagare questo mese è di €' + totalIrpef);

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
                console.log('Detrazioni per lavoratore dipendente  sono di €' + basicDeduction);

                // calcolo detrazioni per familiari 
                let familyDeduction = (750 * ((80000 - taxableIRPEF)/80000)) * dependentFamily;

                console.log('Detrazioni per familiari sono di €' + familyDeduction);


                // calcolo detrazioni per figli
                let childrenDeduction = 0; 
                if (dependentChildren > 0) {
                    
                    childrenDeduction = (950 + (950 * (dependentChildren - 1))) * ((95000 + (15000 * (dependentChildren - 1)) - taxableIRPEF)/(95000 + (15000 * (dependentChildren - 1))));

                } 

                console.log('Detrazioni per figli sono di €' + childrenDeduction);

                // detrazione totali annuali
                let totalDeduction = (basicDeduction + familyDeduction + childrenDeduction) ;
                console.log('Detrazioni totali all anno sono di €' + totalDeduction);

                const monthlyBasicDeduction = basicDeduction / 12;
                const monthlyFamilyDeduction = familyDeduction / 12;
                const monthlyChildrenDeduction = childrenDeduction / 12;

                const monthlyDeduction = totalDeduction / 12;
                console.log('Detrazioni di questo mese sono di €' + monthlyDeduction);
    
                //irpef finale da pagare
                let irpefToPay = (totalIrpef - totalDeduction) / 12;
                console.log('Irpef finale da pagare questo mese è di €' + irpefToPay);


                // CALCOLARE ADDIZIONALI REGIONALI E COMUNALI SUUL'IMPONIBILE IRPEF GIA RECUPERATI ALL'INIZIO DELLA FUNZIONE
               
                const surchargeMunicipal = taxableIRPEF *  municipalTax / 100;
                const surchargeRegional = taxableIRPEF * regionalTax / 100;
         
                const totalSurcharge = (surchargeMunicipal + surchargeRegional) / 12 ;

                console.log('Le addizionali totali sono di €' + totalSurcharge);

                
                // CALCOLO FINALE 
                // salario netto
                const netSalary = totalGrossSalary - totalINPS - irpefToPay - totalSurcharge + reimbursement;

                console.log('il salario netto finale sarà di €' + netSalary);

    
                // aggiorna il campo "payroll_net_salary"
                irpefToPayInput.value = irpefToPay.toFixed(2);
                totalInpsInput.value = totalINPS.toFixed(2);
                basicDeductionInput.value = monthlyBasicDeduction.toFixed(2);
                familyDeductionInput.value = monthlyFamilyDeduction.toFixed(2);
                childrenDeductionInput.value = monthlyChildrenDeduction.toFixed(2);
                employeeDeductionInput.value = monthlyDeduction.toFixed(2);
                totalSurchargeInput.value = totalSurcharge.toFixed(2);
                grossSalaryInput.value = taxableIRPEF.toFixed(2);
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
</x-app-layout>
