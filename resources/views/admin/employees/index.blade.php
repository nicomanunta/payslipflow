
<x-app-layout>
    <div style="min-height: 100vh;" class=" container position-relative">
        <div class="row">
            <div class="col-12">
                <h1 class="text-shadow-grey text-center text-uppercase mt-5 montserrat-bold dark-grey">dipendenti {{$user->name}}</h1>
                <a href="{{route('admin.employees.create')}}"><button class="btn-add-employee mt-4 mb-3 text-uppercase montserrat-bold">aggiungi un dipendente <b>+</b></button></a>
                
                <table class="table border mt-2">
                    <thead>
                      <tr class="poppins-medium text-shadow-blue">
                        <th scope="col" class="dark-grey">Foto</th>
                        <th scope="col" class="dark-grey">Nome</th>
                        <th scope="col" class="dark-grey">Cognome</th>
                        <th scope="col" class="dark-grey">Ruolo</th>
                        <th scope="col" class="dark-grey">Età</th>
                        <th scope="col" class="dark-grey">Email</th>
                        <th scope="col" class="dark-grey">Telefono</th>
                        <th scope="col" class="dark-grey">Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="text-shadow roboto-regular">
                                <td class="border-0  medium-grey">
                                    <a href="{{route('admin.employees.show', ['employee' => $employee->id])}}">
                                        <img class="employee-img" src="{{ $employee->employee_img ? asset('storage/' . $employee->employee_img) : URL::asset('/img/profilo-vuoto.jpeg') }}" alt="">   
                                    </a>
                                </td>
                                    
                                <td class="border-0  medium-grey">{{$employee->employee_name}}</td>
                                <td class="border-0  medium-grey">{{$employee->employee_surname}}</td>
                                <td class="border-0  medium-grey">{{$employee->employee_role}}</td>
                                <td class="border-0  medium-grey">{{$employee->age}}</td>
                                <td class="border-0  medium-grey">{{$employee->employee_email}}</td>
                                <td class="border-0  medium-grey">{{$employee->employee_phone}}</td>
                                <td class="border-0  medium-grey">
                                    {{-- visualizzazione profilo + contratto + buste paga  --}}
                                    <a href="{{route('admin.employees.show', ['employee' => $employee->id])}}">
                                        <button class="btn-tools-index">
                                            <i class="fa-solid fa-user"></i>
                                        </button></a>
                                    @if($employee->contracts->isNotEmpty())    
                                        {{-- creazione busta paga --}}
                                        <a href="{{route('admin.payrolls.create', ['employee_id' => $employee->id])}}">
                                            <button class="btn-tools-index">
                                                <i class="fa-solid fa-euro-sign"></i>
                                            </button></a>
                                    @else
                                        {{-- creazione di un nuovo contratto --}}
                                        <a href="{{ route('admin.contracts.create', ['employee_id' => $employee->id]) }}">
                                            <button class="btn-tools-index">
                                                <i class="fa-solid fa-plus"></i>
                                            </button></a>
                                    @endif
                                    <button class="btn-tools-index"  data-bs-toggle="modal" data-bs-target="#modalDeleteEmployee{{ $employee->id }}"><i class="fa-solid fa-trash cestino"></i></button>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
        <img class="logo-payslipflow-dashboard position-absolute" src="{{URL::asset('/img/logo-scritta-sfondo-bianco.jpeg')}}" alt="">
    </div>
    @foreach ($employees as $employee)
        @include('admin.employees.partials.modal_delete_employee', ['employee_id' => $employee->id])
    @endforeach
</x-app-layout>
