<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Crea contratto di {{$employee->employee_name}} {{$employee->employee_surname}}</h1>
            </div>
            <div class="col-12">
                
                {{-- FORM CREATE PER TABELLA CONTRACTS & DEDUCTIONS --}}
                <form action="{{route('admin.contracts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- TABELLA CONTRACTS --}}
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    
                    {{--contract_name--}}
                    <div class="form-group">
                        <label class="" for="contract_name">Nome del contratto</label>
                        <input class="form-control" type="text" name="contract_name" id="contract_name" placeholder="Nome | es. CCNL Metalmeccanico" value="{{old('contract_name')}}" required>
                        @error('contract_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_type--}}
                    <div class="form-group">
                        <label for="contract_type">Tipo di contratto</label><br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Full-Time" id="contract_type_1" 
                                {{ in_array('Full-Time', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_1">Full-Time</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Part-Time" id="contract_type_2"
                                {{ in_array('Part-Time', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_2">Part-Time</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Tempo indeterminato" id="contract_type_3"
                                {{ in_array('Tempo indeterminato', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_3">Tempo indeterminato</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Tempo determinato" id="contract_type_4"
                                {{ in_array('Tempo determinato', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_4">Tempo determinato</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Lavoro a progetto" id="contract_type_5"
                                {{ in_array('Lavoro a progetto', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_5">Lavoro a progetto</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Freelance" id="contract_type_6"
                                {{ in_array('Freelance', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_6">Freelance</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Stage" id="contract_type_7"
                                {{ in_array('Stage', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_7">Stage</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="contract_type[]" value="Apprendistato" id="contract_type_8"
                                {{ in_array('Apprendistato', old('contract_type', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="contract_type_8">Apprendistato</label>
                        </div>
                    </div>
                    

                    {{--contract_level--}}
                    <div class="form-group">
                        <label class="" for="contract_level">Livello del contratto</label>
                        <input class="form-control" type="text" name="contract_level" id="contract_level" placeholder="Livello del contratto" value="{{old('contract_level')}}">
                        @error('contract_level')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_gross_monthly_salary--}}
                    <div class="form-group">
                        <label class="" for="contract_gross_monthly_salary">Retribuzione mensile lorda</label>
                        <input class="form-control" type="number" name="contract_gross_monthly_salary" id="contract_gross_monthly_salary" placeholder="Retribuzione mensile lorda" step="0.01" min="0" value="{{old('contract_gross_monthly_salary')}}" required>
                        @error('contract_gross_monthly_salary')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_week_hours--}}
                    <div class="form-group">
                        <label class="" for="contract_week_hours">Ore settimanali</label>
                        <input class="form-control" type="number" name="contract_week_hours" id="contract_week_hours" placeholder="Ore settimanali" min="0" value="{{old('contract_week_hours')}}" required>
                        @error('contract_week_hours')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_vacation_days--}}
                    <div class="form-group">
                        <label for="contract_vacation_days">Ferie annuali</label>
                        <input class="form-control" type="number" name="contract_vacation_days" id="contract_vacation_days" placeholder="Numero di ferie annuali" step="1" min="0" value="{{old('contract_vacation_days')}}">
                        @error('contract_vacation_days')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_surcharge_regional--}}
                    <div class="form-group">
                        <label for="contract_surcharge_regional">Addizionale Regionale &#40;%&#41;</label>
                        <input class="form-control" type="number" name="contract_surcharge_regional" id="contract_surcharge_regional" placeholder="Percentuale addizionale Regionale" step="0.01" min="0" max="100" value="{{old('contract_surcharge_regional')}}">
                        @error('contract_surcharge_regional')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_surcharge_municipal--}}
                    <div class="form-group">
                        <label for="contract_surcharge_municipal">Addizionale Comunale &#40;%&#41;</label>
                        <input class="form-control" type="number" name="contract_surcharge_municipal" id="contract_surcharge_municipal" placeholder="Percentuale addizionale Comunale " step="0.01" min="0" max="100" value="{{old('contract_surcharge_municipal')}}">
                        @error('contract_surcharge_municipal')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_start_date--}}
                    <div class="form-group">
                        <label for="contract_start_date">Data inizio</label>
                        <input class="form-control" type="date" name="contract_start_date" id="contract_start_date" placeholder="Data inizio" value="{{old('contract_start_date')}}" required>
                        @error('contract_start_date')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{--contract_end_date--}}
                    <div class="form-group">
                        <label for="contract_end_date">Data fine</label>
                        <input class="form-control" type="date" name="contract_end_date" id="contract_end_date" placeholder="Data fine" value="{{old('contract_end_date')}}">
                        @error('contract_end_date')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- TABELLA DEDUCTIONS --}}
                    {{-- dependent_family_members --}}
                    <div class="form-group">
                        <label for="dependent_family_members">Familiari a carico</label>
                        <input type="number" class="form-control" name="dependent_family_members" id="dependent_family_members" placeholder="Numero di familiari a carico" value="{{old('dependent_family_members')}}">
                        @error('dependent_family_members')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- dependent_children_under_24 --}}
                    <div class="form-group">
                        <label for="dependent_children_under_24">Figli a carico sotto i 24 anni </label>
                        <input type="number" class="form-control" name="dependent_children_under_24" id="dependent_children_under_24" placeholder="Numero di figli a carico under 24 " value="{{old('dependent_children_under_24')}}">
                        @error('dependent_children_under_24')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <button type="submit">invia</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
