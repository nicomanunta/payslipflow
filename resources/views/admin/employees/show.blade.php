
<x-app-layout>
    <div class="bg-general">
        <div class="container ">
            <div class="row ms-3">
                <div class="col-8 mt-4 d-flex align-items-center">
                    <img class="ms-2 show-employee-img " src="{{ asset('storage/' . $employee->employee_img) }}" alt="Foto del dipendente">
                    <div class="mx-5">
                        <h1 class="">{{$employee->employee_name}} {{$employee->employee_surname}}</h1>
                        <p>{{$employee->employee_role}}</p>
                    </div>
                </div>
                <div  class="col-4 d-flex align-items-center">
                    <a href="{{route('admin.employees.edit', ['employee' => $employee->id])}}">
                        <button class="me-2"><i class="fa-regular fa-pen-to-square"></i></button></a>
                    @if($employee->contracts->isNotEmpty())    
                        {{-- modifica contratto --}}
                        <a href="{{route('admin.contracts.edit', ['contract' => $employee->contracts->last()->id])}}">
                            <button class="me-2"><i class="fa-solid fa-file-contract"></i></button></a>
                        {{-- creazione busta paga --}}
                        <a href="{{route('admin.payrolls.create', ['employee_id' => $employee->id])}}">
                            <button class="me-2"><i class="fa-solid fa-euro-sign"></i></button>
                        </a>
                    @else
                        {{-- creazione di un nuovo contratto --}}
                        <a href="{{ route('admin.contracts.create', ['employee_id' => $employee->id]) }}">
                            <button class="me-2"><i class="fa-solid fa-plus"></i></button>
                        </a>
                    @endif
                </div>
                
            </div>
                
            <div class="row mx-1 mt-5">
                <h3 class="pb-2">Dati personali</h3>
                <div class="col-7">
                    <ul class="p-0">
                        <li class="mb-2"><b>Email:</b> {{$employee->employee_email}}</li>
                        <li class="mb-2"><b>Cellulare:</b> {{$employee->employee_phone}}</li>
                        <li class="mb-2"><b>Data di nascita:</b> {{ \Carbon\Carbon::parse($employee->employee_birth_date)->format('d-m-Y') }}</li>   
                    </ul>
                </div>
                <div class="col-5 ">
                    <ul class="p-0">
                        <li class="mb-2"><b>Stato:</b> {{$employee->employee_state}}</li>
                        <li class="mb-2"><b>Regione:</b> {{$employee->employee_region}}</li>
                        <li class="mb-2"><b>Città:</b> {{$employee->employee_city}}</li>   
                    </ul>
                </div>
            </div>
            <div class="row mx-1 mt-5">
                <h3 class="pb-2">Contratto attivo</h3>
                <div class="col-7">
                    <ul class="p-0">
                        <li class="mb-2"><b>Nome:</b> {{$contract->contract_name}}</li>
                        <li class="mb-2"><b>Tipo:</b>  
                            @foreach ($contract->contract_type as $type)
                                {{$type}}     
                            @endforeach
                        </li>
                        <li class="mb-2"><b>Livello:</b> {{ $contract->contract_level }}</li>   
                        <li class="mb-2"><b>Data inizio:</b> {{ \Carbon\Carbon::parse($contract->contract_start_date)->format('d-m-Y') }}</li>   
                    </ul>
                </div>
                <div class="col-5 ">
                    <ul class="p-0">
                        <li class="mb-2"><b>Salario lordo:</b> {{$contract->contract_gross_monthly_salary}}€</li>
                        <li class="mb-2"><b>Ore settimanali di lavoro:</b> {{$contract->contract_week_hours}}</li>
                        <li class="mb-2"><b>Numero di ferie annuali:</b> {{$contract->contract_vacation_days}}</li>   
                        <li class="mb-2"><b>Data fine:</b> {{ \Carbon\Carbon::parse($contract->contract_end_date)->format('d-m-Y') }}</li>   
                    </ul>
                </div>
            </div>
            <div class="row mx-1 mt-5">
                <h3 class="pb-2">Ultime due buste paga </h3>    
                @if ($payroll)
                @foreach ($payroll as $item)
                <button class="" data-bs-toggle="modal" data-bs-target="#modalInfoPayroll{{ $item->id }}"><i class="fa-solid fa-circle-info"></i></button>
                        <div class="col-7 mt-2">
                            <ul class="p-0">
                                <li class="mb-2"><b>Mese:</b> {{$item->payroll_month}}</li>               
                                <li class="mb-2"><b>Data di pagamento:</b> {{ \Carbon\Carbon::parse($item->payroll_day_paid)->format('d-m-Y') }}</li>   
                            </ul>
                        </div>
                        <div class="col-5 mt-2">
                            <ul class="p-0">
                                <li class="mb-2"><b>Salario netto:</b> <span class="fs-5">{{$item->payroll_net_salary}}€</span></li>
                            </ul>
                        </div>
                    
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
    @foreach ($payroll as $item)
        @include('admin.payrolls.partials.modal_info_payroll', ['payroll_id' => $item->id])
    @endforeach
</x-app-layout>
