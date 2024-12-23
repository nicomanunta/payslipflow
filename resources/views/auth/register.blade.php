<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome Azienda')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        {{-- Phone --}}
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Telefono')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        {{-- User IMG --}}
        <div class="mt-4">
            <x-input-label for="user_img" :value="__('Logo Azienda')" />
            <input id="user_img" class="block mt-1 w-full" type="file" name="user_img" required autocomplete="username" />
            <x-input-error :messages="$errors->get('user_img')" class="mt-2" />
        </div>

        
    
        {{-- Legal City --}}
        <div class="mt-4">
            <x-input-label for="legal_city" :value="__('Sede legale')" />
            <x-text-input id="legal_city" class="block mt-1 w-full" type="text" name="legal_city" :value="old('legal_city')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('legal_city')" class="mt-2" />
        </div>

        {{-- Zip Code --}}
        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('Codice postale')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="number" name="zip_code" :value="old('zip_code')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Hai già un\'azienda registrata?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registra azienda') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
