<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12 text-center">    
                <h1>{{ auth()->user()->name }}</h1>
            </div>
            <div class="col-6">
                <a class="text-decoration-none" href="{{route('admin.employees.index')}}">
                    <div class="card" style="width: 100%; min-height: 200px;">
                        <div class="card-body">
                          <h2 class="card-title">Dipendenti</h2>
                          <h4>Dipendenti totali: {{$activeEmployeesCount}}</h4>
                          <p class="text-subtitle text-body-secondary">premi per accedere all'elenco</p>
                          <a href="{{route('admin.employees.create')}}" class="card-link">Aggiungi un dipendente</a>

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6">
                <a class="text-decoration-none" href="{{route('admin.payrolls.index')}}">
                    <div class="card" style="width: 100%; min-height: 200px;" >
                        <div class="card-body">
                          <h2 class="card-title">Buste paga</h2>
                          <h4>Buste paga totali: {{$activePayrollsCount}}</h4>
                          <p class="text-subtitle text-body-secondary">premi per accedere all'elenco</p>
                          <a href="{{route('admin.employees.index')}}" class="card-link">Crea una nuova busta paga</a>
                        </div>
                    </div>
                </a>
            </div>
                
        </div>
    </div>
</x-app-layout>
