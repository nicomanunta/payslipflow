<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <h1 class="text-shadow-grey text-center text-uppercase mt-4 montserrat-bold dark-grey">Buste paga {{$user->name}}</h1>
                <table class="table border mt-4">
                    <thead>
                      <tr class="poppins-medium text-shadow-blue">
                        <th scope="col" class="dark-grey">Nome</th>
                        <th scope="col" class="dark-grey">Cognome</th>
                        <th scope="col" class="dark-grey">Ruolo</th>
                        <th scope="col" class="dark-grey">Status</th>
                        <th scope="col" class="dark-grey">Mese-Anno</th>
                        <th scope="col" class="dark-grey">Salario netto</th>
                        <th scope="col" class="dark-grey">Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls as $item)
                            <tr class="text-shadow roboto-regular">
                                
                                <td class="medium-grey">{{ $item->employee->employee_name }}</td>
                                <td class="medium-grey">{{ $item->employee->employee_surname }}</td>
                                <td class="medium-grey">{{ $item->employee->employee_role }}</td>
                                <td class="medium-grey">{{ $item->employee->employee_status }}</td>
                
                                <td class="medium-grey">{{ $item->payroll_month }}</td>
                                <td class="medium-grey">{{ $item->payroll_net_salary }}&euro;</td>
                                <td class="medium-grey">
                                    <button data-bs-toggle="modal" data-bs-target="#modalInfoPayroll{{ $item->id }}" class="btn-tools-index"><i class="fa-regular fa-eye"></i></button>
                                    <a href="{{route('admin.payrolls.edit', ['payroll' => $item->id])}}"><button class="btn-tools-index"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    @foreach ($payrolls as $item)
        @include('admin.payrolls.partials.modal_info_payroll', ['payroll_id' => $item->id])
    @endforeach
</x-app-layout>