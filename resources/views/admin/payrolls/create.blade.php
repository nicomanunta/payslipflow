@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Compila la busta paga per {{$employee->employee_name}} {{$employee->employee_surname}}</h1>
            </div>
            <div class="col-12">
                {{-- FORM CREATE PER TABELLA PAYROLLS  --}}
                <form action="{{route('admin.payrolls.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- employee_id --}}
                    <div class="form-group">
                        <label for="employee_id">Dipendente</label>
                        <select name="employee_id" id="employee_id" class="form-control">
                            <option value="">Seleziona un dipendente</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->employee_name }} {{ $employee->employee_surname }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
                </form>
            </div>
        </div>
    </div>
@endsection