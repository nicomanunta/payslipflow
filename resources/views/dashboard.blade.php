<x-app-layout>
    <div style="min-height: 100vh;" class="container overflow-hidden position-relative">
        <div class="row my-4 align-items-center">
            <div class="col-12 mt-3 text-center text-uppercase ">    
                <h1 class="font-title-dashboard montserrat-bold dark-grey text-shadow-grey">Gestionale dipendenti </h1>
                <h1 class="font-title-dashboard montserrat-bold dark-grey text-shadow-grey">"{{ auth()->user()->name }}" </h1>
                
            </div>

            
        </div>
        <div class="row my-5 pt-3 mx-3 text-center ">
            <div class="col-6">
                <a class="text-decoration-none" href="{{route('admin.employees.index')}}">    
                    <button class="btn-list-dashboard py-5">
                        <i class=" fa-solid fa-users icon-users text-shadow-grey"></i>
                        <h1 class="mt-5 mb-0 text-uppercase text-white poppins-medium text-shadow-grey h1-btn-dashboard">Dipendenti </h1>
                    </button>
                </a>
                
            </div>
            <div class="col-6">
                <a class="text-decoration-none" href="{{route('admin.payrolls.index')}}">    
                    <button class="btn-list-dashboard py-5">
                        <i class=" fa-solid  fa-table-list icon-users text-shadow-grey"></i>
                        <h1 class="mt-5 mb-0 text-uppercase text-white poppins-medium text-shadow-grey h1-btn-dashboard">Buste paga </h1>
                    </button>
                </a>
                
            </div>   
        </div>
        
        <img class="logo-payslipflow-dashboard position-absolute" src="{{URL::asset('/img/logo-scritta-sfondo-bianco.jpeg')}}" alt="">
        
        
        
        {{-- <h2 class="text-white poppins-medium text-shadow-white">Dipendenti totali: {{$activeEmployeesCount}}</h2> --}}
        {{-- <h2 class="text-white poppins-medium text-shadow-white">Buste paga totali: {{$activePayrollsCount}}</h2> --}}
    </div>
</x-app-layout>
