<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <h1>Elenco buste paga</h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Ruolo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Mese-Anno</th>
                        <th scope="col">Salario netto</th>
                        <th scope="col">Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls as $payroll)
                            <tr>
                                
                                <td>{{ $payroll->employee->employee_name }}</td>
                                <td>{{ $payroll->employee->employee_surname }}</td>
                                <td>{{ $payroll->employee->employee_role }}</td>
                                <td>{{ $payroll->employee->employee_status }}</td>
                
                                <td>{{ $payroll->payroll_month }}</td>
                                <td>{{ $payroll->payroll_net_salary }}</td>
                
                                <td>
                                    <a href="{{route('admin.payrolls.edit', ['payroll' => $payroll->id])}}">
                                        <button>
                                            <i class="fa-solid fa-euro-sign"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>