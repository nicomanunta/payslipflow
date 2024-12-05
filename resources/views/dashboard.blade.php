<x-app-layout>
    <div class="container ">
        <div class="row">
            <div class="col-12 text-center">    
                <h1>{{ auth()->user()->name }}</h1>
            </div>
            <div class="col-4">
                <a class="text-decoration-none" href="{{route('admin.employees.index')}}">
                    <div class="card" style="width: 100%; min-height: 200px;">
                        <div class="card-body">
                          <h2 class="card-title">Dipendenti</h2>
                          <h4>Dipendenti totali: </h4>
                          <a href="{{route('admin.employees.create')}}" class="card-link">Aggiungi un dipendente</a>
                          <p class="text-subtitle text-body-secondary">premi per accedere all'elenco</p>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a class="text-decoration-none" href="{{route('admin.contracts.index')}}">
                    <div class="card" style="width: 100%; min-height: 200px;">
                        <div class="card-body">
                          <h2 class="card-title">Contratti</h2>
                          <h4>Contratti totali: </h4>
                          <p class="text-subtitle text-body-secondary">premi per accedere all'elenco</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a class="text-decoration-none" href="{{route('admin.payrolls.index')}}">
                    <div class="card" style="width: 100%; min-height: 200px;" >
                        <div class="card-body">
                          <h2 class="card-title">Buste paga</h2>
                          <h4>Buste paga totali: </h4>
                          <p class="text-subtitle text-body-secondary">premi per accedere all'elenco</p>
                        </div>
                    </div>
                </a>
            </div>
                
        </div>
    </div>
</x-app-layout>
