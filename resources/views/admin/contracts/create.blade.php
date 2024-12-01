@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Crea contratto di {{$employee->employee_name}} {{$employee->employee_surname}}</h1>
            </div>
            <div class="col-12">
                {{-- FORM CREATE PER TABELLA CONTRACTS --}}
                <form action="{{route('admin.contracts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    
                    {{--contract_name--}}
                    <div class="form-group">
                        <label class="" for="contract_name">Nome del contratto</label>
                        <input class="form-control" type="text" name="contract_name" id="contract_name" placeholder="Nome | es. CCNL Metalmeccanico" value="{{old('contract_name')}}" required>
                        @error('contract_name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_type--}}
                    <div class="form-group">
                        <label classe for="contract_type">Tipo di contratto</label>
                        <select class="form-control" name="contract_type[]" id="contract_type" multiple required>
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
                    <div class="form-group">
                        <label class="" for="contract_level">Livello del contratto</label>
                        <input class="form-control" type="text" name="contract_level" id="contract_level" placeholder="Livello del contratto" value="{{old('contract_level')}}">
                        @error('contract_level')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_gross_monthly_salary--}}
                    <div class="form-group">
                        <label class="" for="contract_gross_monthly_salary">Retribuzione mensile lorda</label>
                        <input class="form-control" type="number" name="contract_gross_monthly_salary" id="contract_gross_monthly_salary" placeholder="Retribuzione mensile lorda" step="0.01" min="0" value="{{old('contract_gross_monthly_salary')}}" required>
                        @error('contract_gross_monthly_salary')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_vacation_days--}}
                    <div class="form-group">
                        <label for="contract_vacation_days">Ferie annuali</label>
                        <input class="form-control" type="number" name="contract_vacation_days" id="contract_vacation_days" placeholder="Numero di ferie annuali" step="1" min="0" value="{{old('contract_vacation_days')}}">
                        @error('contract_vacation_days')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_inps_tax--}}
                    <div class="form-group">
                        <label for="contract_inps_tax">Aliquota INPS &#40;%&#41;</label>
                        <input class="form-control" type="number" name="contract_inps_tax" id="contract_inps_tax" placeholder="Percentuale aliquota INPS" step="0.01" min="0" max="100" value="{{old('contract_inps_tax')}}">
                        @error('contract_inps_tax')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_surcharge_regional--}}
                    <div class="form-group">
                        <label for="contract_surcharge_regional">Addizionale Regionale &#40;%&#41;</label>
                        <input class="form-control" type="number" name="contract_surcharge_regional" id="contract_surcharge_regional" placeholder="Percentuale addizionale Regionale" step="0.01" min="0" max="100" value="{{old('contract_surcharge_regional')}}">
                        @error('contract_surcharge_regional')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_surcharge_municipal--}}
                    <div class="form-group">
                        <label for="contract_surcharge_municipal">Addizionale Comunale &#40;%&#41;</label>
                        <input class="form-control" type="number" name="contract_surcharge_municipal" id="contract_surcharge_municipal" placeholder="Percentuale addizionale Comunale " step="0.01" min="0" max="100" value="{{old('contract_surcharge_municipal')}}">
                        @error('contract_surcharge_municipal')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_start_date--}}
                    <div class="form-group">
                        <label for="contract_start_date">Data inizio</label>
                        <input class="form-control" type="date" name="contract_start_date" id="contract_start_date" placeholder="Data inizio" value="{{old('contract_start_date')}}" required>
                        @error('contract_start_date')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_end_date--}}
                    <div class="form-group">
                        <label for="contract_end_date">Data inizio</label>
                        <input class="form-control" type="date" name="contract_end_date" id="contract_end_date" placeholder="Data inizio" value="{{old('contract_end_date')}}">
                        @error('contract_end_date')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection