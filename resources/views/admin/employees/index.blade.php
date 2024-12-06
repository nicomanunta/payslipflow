
<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <h1>Elenco dipendenti</h1>
                <table class="table">
                    <thead>
                      <tr>
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
                          <td>{{$employee->employee_name}}</td>
                          <td>{{$employee->employee_surname}}</td>
                          <td>{{$employee->employee_role}}</td>
                          <td>{{$employee->age}}</td>
                          <td>{{$employee->employee_email}}</td>
                          <td>{{$employee->employee_phone}}</td>
                          <td>
                              profilo
                              contratto
                              busta
                          </td>
                        </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
