<section>
    <header>
        <h2 class="montserrat-bold dark-grey text-shadow-grey ">
            {{ __('Informazioni Profilo') }}
        </h2>

        <p class="mt-1  poppins-medium steel-blue">
            {{ __("Aggiorna le informazioni dell'account aziendale.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Il tuo indirizzo email non è verificato.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600  hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Fare clic qui per inviare nuovamente l\'e-mail di verifica.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="phone" :value="__('Telefono')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="legal_city" :value="__('Sede legale')" />
            <x-text-input id="legal_city" name="legal_city" type="text" class="mt-1 block w-full" :value="old('legal_city', $user->legal_city)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('legal_city')" />
        </div>
        <div>
            <x-input-label for="zip_code" :value="__('CAP')" />
            <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old('zip_code', $user->zip_code)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
        </div>
        <div>
            <x-input-label for="user_img" :value="__('Immagine Aziendale')" />
            <input id="user_img" name="user_img" type="file" class="mt-1 block w-full form-control" />
            <x-input-error class="mt-2" :messages="$errors->get('user_img')" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn-edit-profile montserrat-bold text-uppercase">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 "
                >{{ __('Salvato.') }}</p>
            @endif
        </div>
    </form>
</section>
