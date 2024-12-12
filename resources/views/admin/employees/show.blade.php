
<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                {{-- DATI TABELLA EMPLOYEES --}}
                <h1>Profilo {{$employee->employee_name}} {{$employee->employee_surname}}</h1>
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
                    FOTO:{{$employee->employee_img}}
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
                        PERCENTUALE INPS: {{$contract->contract_inps_tax}}%
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
                            {{$item->payroll_month}}
                            <br>
                            {{$item->payroll_day_paid}}
                            <br>
                            {{$item->payroll_net_salary}}
                            <br>
                            {{$item->payroll_gross_salary}}
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
