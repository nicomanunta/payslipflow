<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-uppercase montserrat-bold dark-grey text-shadow-grey text-center my-4">Aggiungi un profilo di un dipendente</h1>
            </div>
            <div class="col-12 mx-2">
                {{-- FORM CREATE PER TABELLA EMPLOYEE --}}
                <form action="{{route('admin.employees.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- employee_name --}}
                    <div class="form-group mb-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_name">Nome</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_name" id="employee_name" placeholder="Nome" value="{{ old('employee_name')}}" required>
                        @error('employee_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_surname --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_surname">Cognome</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_surname" id="employee_surname" placeholder="Cognome" value="{{ old('employee_surname')}}" required>
                        @error('employee_surname')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_sex --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_sex">Sesso del dipendente</label>
                        <select class="form-control border-steel-blue" name="employee_sex" id="employee_sex">
                            <option value="">Seleziona il sesso </option>
                            <option value="Uomo" {{old('employee_sex') == 'Uomo' ? 'selected' : ''}}>Uomo</option>
                            <option value="Donna" {{old('employee_sex') == 'Donna' ? 'selected' : ''}}>Donna</option>
                        </select>
                        @error('employee_sex')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    {{-- employee_email --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_email">Email</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_email" id="employee_email" placeholder="Email" value="{{ old('employee_email')}}" required>
                        @error('employee_email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_phone --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_phone">Telefono</label>
                        <input class="form-control border-steel-blue" type="tel" name="employee_phone" id="employee_phone" placeholder="Telefono" value="{{ old('employee_phone')}}" required>
                        @error('employee_phone')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    {{-- employee_state --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_state">Paese di residenza</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_state" id="employee_state" placeholder="Paese" value="{{ old('employee_state')}}">
                        @error('employee_state')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_region --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_region">Regione di residenza</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_region" id="employee_region" placeholder="Regione" value="{{old('employee_region')}}">
                        @error('employee_region')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_city --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_city">Comune di residenza</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_city" id="employee_city" placeholder="Comune" value="{{old('employee_city')}}">
                        @error('employee_city')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_birth_date --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_birth_date">Data di nascita</label>
                        <input class="form-control border-steel-blue" type="date" name="employee_birth_date" id="employee_birth_date" placeholder="Data di nascita" value="{{old('employee_birth_date')}}" required>
                        @error('employee_birth_date')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_role --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_role">Posizione lavorativa</label>
                        <input class="form-control border-steel-blue" type="text" name="employee_role" id="employee_role" placeholder="Posizione lavorativa" value="{{old('employee_role')}}" required>
                        @error('employee_role')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_status --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_status">Status lavorativo</label>
                        <select class="form-control border-steel-blue" name="employee_status" id="employee_status">
                            <option value="">Seleziona lo status lavorativo</option>
                            <option value="Attivo" {{old('employee_status') == 'Attivo' ? 'selected' : ''}}>Attivo</option>
                            <option value="In prova" {{old('employee_status') == 'In prova' ? 'selected' : ''}}>In prova</option>
                            <option value="Sospeso" {{old('employee_status') == 'Sospeso' ? 'selected' : ''}}>Sospeso</option>
                            <option value="Licenziato" {{old('employee_status') == 'Licenziato' ? 'selected' : ''}}>Licenziato</option>
                            <option value="Pensione" {{old('employee_status') == 'Pensione' ? 'selected' : ''}}>Pensione</option>
                        </select>
                        @error('employee_status')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_hiring_date --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_hiring_date">Data di assunzione</label>
                        <input class="form-control border-steel-blue" type="date" name="employee_hiring_date" id="employee_hiring_date" placeholder="Data di assunzione" value="{{old('employee_hiring_date')}}" required>
                        @error('employee_hiring_date')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- employee_img --}}
                    <div class="form-group my-3">
                        <label class="my-1  roboto-regular medium-grey text-shadow-blue" for="employee_img">Foto</label>
                        <input class="form-control border-steel-blue" type="file" name="employee_img" id="employee_img" placeholder="Foto" accept="image/*" >
                        @error('employee_img')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-end me-5 my-4">
                        
                        <button class="btn-save montserrat-bold text-white text-uppercase" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
