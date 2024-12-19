
<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <h1>Elenco dipendenti</h1>
                <a href="{{route('admin.employees.create')}}"><button class="my-3">aggiungi un dipendente <b>+</b></button></a>
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Ruolo</th>
                        <th scope="col">Età</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            
                        <tr>
                            <td>
                                <img class="employee-img" src="{{ $employee->employee_img ? asset('storage/' . $employee->employee_img) : URL::asset('/img/profilo-vuoto.jpeg') }}" alt="">   
                            </td>
                            
                            <td class="">{{$employee->employee_name}}</td>
                            <td>{{$employee->employee_surname}}</td>
                            <td>{{$employee->employee_role}}</td>
                            <td>{{$employee->age}}</td>
                            <td>{{$employee->employee_email}}</td>
                            <td>{{$employee->employee_phone}}</td>
                            <td>
                                {{-- visualizzazione profilo + contratto + buste paga  --}}
                                <a href="{{route('admin.employees.show', ['employee' => $employee->id])}}">
                                    <button>
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                </a>
                                @if($employee->contracts->isNotEmpty())    
                                    {{-- creazione busta paga --}}
                                    <a href="{{route('admin.payrolls.create', ['employee_id' => $employee->id])}}">
                                        <button>
                                            <i class="fa-solid fa-euro-sign"></i>
                                        </button>
                                    </a>
                                @else
                                    {{-- creazione di un nuovo contratto --}}
                                    <a href="{{ route('admin.contracts.create', ['employee_id' => $employee->id]) }}">
                                        <button>
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
