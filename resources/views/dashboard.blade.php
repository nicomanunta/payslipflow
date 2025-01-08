<x-app-layout>
    <div class="container ">
        <div class="row my-3 align-items-center">
            <div class="col-8 text-start">    
                <h1 class="font-title-dashboard montserrat-bold dark-grey text-shadow-grey">Benvenuto nel gestionale dipendenti di "{{ auth()->user()->name }}"</h1>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <div class="logo-dashboard ">
                    <img class="" src="{{ asset('storage/' . Auth::user()->user_img) }}" alt="">
                </div>
            </div>

            
        </div>
        <div class="row my-5">
            <div class="col-6">
                <a class="text-decoration-none" href="{{route('admin.employees.index')}}">
                    <div class="card bg-steel-blue border-0" style="width: 100%; ">
                        <div class="card-body">
                            <h2 class="text-white poppins-medium text-shadow-white">Dipendenti totali: {{$activeEmployeesCount}}</h2>
                            <p class=" my-4 roboto-regular text-white">premi per accedere all'elenco</p>
                            <a href="{{route('admin.employees.create')}}" class="card-link "><button class="text-end btn-card-dashboard  text-uppercase montserrat-bold">Aggiungi un dipendente <b>+</b></button></a>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="col-6">
                <a class="text-decoration-none" href="{{route('admin.payrolls.index')}}">
                    <div class="card bg-steel-blue border-0" style="width: 100%; " >
                        <div class="card-body">
                            <h2 class="text-white poppins-medium text-shadow-white">Buste paga totali: {{$activePayrollsCount}}</h2>
                            <p class=" my-4 roboto-regular text-white">premi per accedere all'elenco</p>
                            <a href="{{route('admin.employees.index')}}" class="card-link "><button class="btn-card-dashboard  text-uppercase montserrat-bold">Crea una nuova busta paga</button></a>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
