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
                </form>
            </div>
        </div>
    </div>
@endsection