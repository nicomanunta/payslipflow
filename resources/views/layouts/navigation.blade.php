

<nav x-data="{ open: false }" class="h-100  bg-steel-blue border-b  overflow-x-hidden overflow-y-auto">
    <!-- Primary Navigation Menu -->
   
    <div class="container py-4 h-100 ">
        {{-- <div class="row mt-3 ">
            <!-- Logo -->
            <div class="col-3"></div>
            <div class="col-6">
                <a class="" href="{{ route('dashboard') }}">
                    <img width="100%" class="me-2 " src="{{ asset('storage/' . Auth::user()->user_img) }}" alt="">    
                </a>
            </div>
            
        </div> --}}
        <div class="h-100  row d-flex flex-column justify-content-between text-uppercase ">
            <div class="col-12 ">
                <div class="row ">
                    <div class="col-12">
                        <a href="{{route('dashboard')}}">
                            <div class="d-flex justify-content-center">
                                <div class="logo-navbar">
                                    <img class="" src="{{ asset('storage/' . Auth::user()->user_img) }}" alt="">
                                </div>   
                            </div>
                        </a>    
                        <ul class="p-0 mt-3 list-navbar montserrat-bold text-shadow-grey ">
                            <li class="my-5">
                                <a class="text-decoration-none" href="{{route('dashboard')}}">
                                    <div class="row ">
                                        <div class="col-3 text-center">
                                            <i class="fs-4 fa-solid fa-home "></i>
                                        </div>
                                        <div class="col-9 text-center ">
                                            <span>Homepage</span>
                                            {{-- <span>{{Auth::user()->name}}</span> --}}
                                        </div>
                                    </div>    
                                </a>
                            </li>
                            <li class="my-5">
                                <a class="text-decoration-none" href="{{route('admin.employees.index')}}">
                                    <div class="row ">
                                        <div class="col-3 text-center">
                                            <i class="fs-4 fa-solid fa-users "></i>
                                        </div>
                                        <div class="col-9 text-center ">
                                            <span>Elenco dipendenti</span>
                                        </div>
                                    </div>    
                                </a>
                            </li>
                            <li class="my-5">
                                <a class="text-decoration-none" href="{{route('admin.employees.create')}}">
                                    <div class="row ">
                                        <div class="col-3 text-center">
                                            <i class="fs-4 fa-solid fa-user-plus "></i>
                                        </div>
                                        <div class="col-9 text-center">
                                            <span>Aggiungi dipendente</span>
                                        </div>   
                                    </div>
                                </a>
                            </li>
                            
                            <li class="my-5">
                                <a class="text-decoration-none" href="{{route('admin.payrolls.index')}}">
                                    <div class="row ">
                                        <div class="col-3 text-center">
                                            <i class="fs-4 fa-solid fa-table-list"></i>
                                        </div>
                                        <div class="col-9 text-center">
                                            <span>Elenco bustepaga </span>
                                        </div>   
                                    </div>
                                </a>
                            </li>
                            <li class="my-5">
                                <a class="text-decoration-none" href="{{route('profile.edit')}}">
                                    <div class="row ">
                                        <div class="col-3 text-center">
                                            <i class="fs-4 fa-regular fa-building"></i>
                                        </div>
                                        <div class="col-9 text-center">
                                            <span>Profilo {{Auth::user()->name}}</span>
                                        </div>   
                                    </div>
                                </a>
                            </li>
                            <li class="my-5">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{route('logout')}}" class="text-decoration-none" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <div class="row ">
                                            <div class="col-3 text-center">
                                                <i class="fs-4 fa-solid fa-right-from-bracket"></i>
                                            </div>
                                            <div class="col-9 text-center">
                                                {{ __('Esci') }}
                                            </div>   
                                        </div>
                                    </a>   
                                </form>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">

                <div class="row d-flex justify-content-center mt-5 ">
                    <div class="col-12"></div>
                    <img class="logo-payslipflow-navbar " src="{{URL::asset('/img/logo-scritta-blu.jpeg')}}" alt="">
                </div>
            </div>
        </div>
        {{-- <div class="row mt-5">
            <h4 class="ms-2">
                <a :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{Auth::user()->name}}
                </a>   
            </h4>
        </div> --}}

        <!-- Settings Dropdown -->
        {{-- <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profilo') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Esci') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div> --}}
        

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
        
 
</nav>

