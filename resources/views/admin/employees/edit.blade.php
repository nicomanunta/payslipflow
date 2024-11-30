@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiorna i dati di {{$employee->employee_name}} {{$employee->employee_surname}}</h1>
            </div>
            <div class="col-12">
                {{-- FORM EDIT PER TABELLA EMPLOYEES --}}
                <form action="{{route('adimin.employee.update', ['employee' => $employee->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{--employee_name--}}
                    <div class="form-group">
                        <label class="" for="employee_name">Nome</label>
                        <input class="form-control" type="text" name="employee_name" id="employee_name" placeholder="Nome" value="{{old('employee_name', $employee->employee_name)}}">
                        @error('employye_name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_surname--}}
                    <div class="form-group">
                        <label class="" for="employee_surname">Cognome</label>
                        <input class="form-control" type="text" name="employee_surname" id="employee_surname" placeholder="Cognome" value="{{old('employee_surname', $employee->employee_surname)}}">
                        @error('employee_surname')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_email--}}
                    <div class="form-group">
                        <label class="" for="employee_email">Email</label>
                        <input class="form-control" type="text" name="employee_email" id="employee_email" placeholder="Email" value="{{old('employee_email', $employee->employee_email)}}">
                        @error('employee_email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_phone--}}
                    <div class="form-group">
                        <label class="" for="employee_phone">Telefono</label>
                        <input class="form-control" type="tel" name="employee_phone" id="employee_phone" placeholder="Telefono" value="{{old('employee_phone', $employee->employee_phone)}}">
                        @error('employee_phone')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_state--}}
                    <div class="form-group">
                        <label class="" for="employee_state">Paese di residenza</label>
                        <input class="form-control" type="text" name="employee_state" id="employee_state" placeholder="Paese" value="{{old('employee_state', $employee->employee_state)}}">
                        @error('employee_state')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_region--}}
                    <div class="form-group">
                        <label class="" for="employee_region">Regione di residenza</label>
                        <input class="form-control" type="text" name="employee_region" id="employee_region" placeholder="Regione" value="{{old('employee_region', $employee->employee_region)}}">
                        @error('employee_region')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_city--}}
                    <div class="form-group">
                        <label class="" for="employee_city">Comune di residenza</label>
                        <input class="form-control" type="text" name="employee_city" id="employee_city" placeholder="Comune" value="{{old('employee_city', $employee->employee_city)}}">
                        @error('employee_city')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_birth_date--}}
                    <div class="form-group">
                        <label for="employee_birth_date">Data di nascita</label>
                        <input class="form-control" type="date" name="employee_birth_date" id="employee_birth_date" placeholder="Data di nascita" value="{{old('employee_birth_date', $employee->employee_birth_date)}}">
                        @error('employee_birth_date')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_role--}}
                    <div class="form-group">
                        <label class="" for="employee_role">Posizione lavorativa</label>
                        <input class="form-control" type="text" name="employee_role" id="employee_role" placeholder="Posizione lavorativa" value="{{old('employee_role', $employee->employee_role)}}">
                        @error('employee_role')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_status--}}
                    <div class="form-group">
                        <label for="employee_status">Stato dipendente</label>
                        <select class="form-control" name="employee_status" id="employee_status">
                            <option value="">Seleziona lo stato del dipendente</option>
                            <option value="Attivo" {{old('employee_status', $employee->employee_status) == 'Attivo' ? 'selected' : ''}}>Attivo</option>
                            <option value="In prova" {{old('employee_status', $employee->employee_status) == 'In prova' ? 'selected' : ''}}>In prova</option>
                            <option value="Sospeso" {{old('employee_status', $employee->employee_status) == 'Sospeso' ? 'selected' : ''}}>Sospeso</option>
                            <option value="Licenziato" {{old('employee_status', $employee->employee_status) == 'Licenziato' ? 'selected' : ''}}>Licenziato</option>
                            <option value="Pensione" {{old('employee_status', $employee->employee_status) == 'Pensione' ? 'selected' : ''}}>Pensione</option>
                        </select>
                        @error('employee_status')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_hiring_date--}}
                    <div class="form-group">
                        <label class="" for="employee_hiring_date">Data di assunzione</label>
                        <input class="form-control" type="date" name="employee_hiring_date" id="employee_hiring_date" placeholder="Data di assunzione" value="{{old('employee_hiring_date', $employee->employee_hiring_date)}}">
                        @error('employee_hiring_date')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{--employee_img--}}
                    <div class="form-group">
                        <label for="employee_img">Foto</label>
                        <input class="form-control" type="file" name="employee_img" id="employee_img" placeholder="Foto" accept="image/*" value="{{$employee->employee_img}}" >
                        @error('employee_img')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection