@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Crea contratto per {{$employee->employee_name}} {{$employee->employee_surname}}</h1>
            </div>
            <div class="col-12">
                {{-- FORM CREATE PER TABELLA CONTRACTS --}}
                <form action="{{route('admin.contracts.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                
                {{--contract_name--}}
                <div class="form-group">
                    <label class="" for="contract_name">Nome del contratto</label>
                    <input class="form-control" type="text" name="contract_name" id="contract_name" placeholder="Nome | es. CCNL Metalmeccanico">
                    @error('contract_name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                {{--contract_type--}}
                <div class="form-group">
                    <label classe for="contract_type">Tipo di contratto</label>
                    <select class="form-control" name="contract_type[]" id="contract_type" multiple>
                        <option value="Full-Time" {{in_array('Full-Time', old('contract_type', [])) ? 'selected' : ''}}>Full-Time</option>
                        <option value="Part-Time" {{in_array('Part-Time', old('contract_type', [])) ? 'selected' : ''}}>Part-Time</option>
                        <option value="Tempo indeterminato" {{in_array('Tempo indeterminato', old('contract_type', [] ? 'selected' : ''))}}>Tempo indeterminato</option>
                        <option value="Tempo determinato" {{in_array('Tempo dterminato', old('contract_type', [])) ? 'selected' : ''}}>Tempo determinato</option>
                        <option value="Lavoro a progetto" {{in_array('Lavoro a progetto', old('contract_type', [])) 'selected' : ''}}>Lavoro a progetto</option>
                        <option value="Freelance" {{in_array('Freelance', old('contract_type', [])) ? 'selected' : ''}}>Freelance</option>
                        <option value="Stage" {{in_array('Stage', old('contract_type', [])) ? 'selected' : ''}}>Stage</option>
                        <option value="Apprendistato" {{in_array('Apprendistato', old('contract_type', [])) ? 'selected' : ''}}>Apprendistato</option>
                    </select>
                </div>
                {{--contract_level--}}
                {{--contract_gross_monthly_salary--}}
                {{--contract_vacation_days--}}
                {{--contract_inps_tax--}}
                {{--contract_surcharge_regional--}}
                {{--contract_surcharge_municipal--}}
                {{--contract_start_date--}}
                {{--contract_end_date--}}

                </form>
            </div>
        </div>
    </div>
@endsection