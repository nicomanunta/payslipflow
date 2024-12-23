
<x-app-layout>
    <div class="bg-general">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3  d-flex align-items-center">
                    <img class="ms-2 show-employee-img " src="{{ asset('storage/' . $employee->employee_img) }}" alt="Foto del dipendente">
                    <div class="ms-5">
                        <h1 class="">{{$employee->employee_name}} {{$employee->employee_surname}}</h1>
                        <p>{{$employee->employee_role}}</p>
                    </div>
                </div>

                
                <div class="col-12">
                    {{-- DATI TABELLA EMPLOYEES --}}
                    <a href="{{route('admin.employees.edit', ['employee' => $employee->id])}}">
                        <button class="m-3">modifica profilo</button></a>
                    @if($employee->contracts->isNotEmpty())    
                        {{-- modifica contratto --}}
                        <a href="{{route('admin.contracts.edit', ['contract' => $employee->contracts->last()->id])}}">
                            <button class="m-3">modifica contratto</button></a>
                        {{-- creazione busta paga --}}
                        <a href="{{route('admin.payrolls.create', ['employee_id' => $employee->id])}}">
                            <button class="my-3">crea busta paga</button>
                        </a>
                    @else
                        {{-- creazione di un nuovo contratto --}}
                        <a href="{{ route('admin.contracts.create', ['employee_id' => $employee->id]) }}">
                            <button class="my-3">aggiungi contratto</button>
                        </a>
                    @endif
                    <p>
                        EMAIL:{{$employee->employee_email}}
                        <br>
                        CELLULARE:{{$employee->employee_phone}}
                        <br>
                        STATO{{$employee->employee_state}}
                        <br>
                        REGIONE:{{$employee->employee_region}}
                        <br>
                        CITTÀ:{{$employee->employee_city}}
                        <br>
                        DATA DI NASCITA:{{$employee->employee_birth_date}}
                        <br>
                        RUOLO:{{$employee->employee_role}}
                        <br>
                        STATUS:{{$employee->employee_status}}
                        <br>
                        DATA DI ASSUNZIONE:{{$employee->employee_hiring_date}}
                        <br>
                        FOTO: <img width="20%" src="{{ asset('storage/' . $employee->employee_img) }}" alt="Foto del dipendente">

                    </p>
                </div>
                <div class="col-12">
                    {{-- DATI TABELLA CONTRACTS --}}
                    @if ($contract)
                        <p>
                            NOME: {{$contract->contract_name}}
                            <br>
                            TIPO: 
                            @foreach ($contract->contract_type as $type)
                                {{$type}}     
                            @endforeach
                            <br>
                            LIVELLO: {{$contract->contract_level}}
                            <br>
                            LORDO MENSILE: {{$contract->contract_gross_monthly_salary}}€
                            <br>
                            ORE SETTIMANALI: {{$contract->contract_week_hours}}ore
                            <br>
                            NUMERO DI FERIE: {{$contract->contract_vacation_days}}
                            <br>
                            PERCENTUALE ADDIZIONALE COMUNALE: {{$contract->contract_surcharge_municipal}}%
                            <br>
                            PERCENTUALE ADDIZIONALE REGIONALE: {{$contract->contract_surcharge_regional}}%
                            <br>
                            DATA INIZIO CONTRATTO: {{$contract->contract_start_date}}
                            <br>
                            DATA FINE CONTRATTO: {{$contract->contract_end_date}}  
                        </p>
                        
                    @endif
                </div>
                <div class="col-12">
                    @if ($payroll)
                        @foreach ($payroll as $item)
                            <p>
                                MESE: {{$item->payroll_month}}
                                <br>
                                DATA DI PAGAMENTO: {{$item->payroll_day_paid}}
                                <br>
                                SALARIO NETTO: {{$item->payroll_net_salary}}
                                <br>
                                IMPONIBILE IRPEF: {{$item->payroll_taxable_irpef}}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
