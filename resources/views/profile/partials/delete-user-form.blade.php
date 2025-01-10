<section class="space-y-6">
    <header>
        <h2 class="montserrat-bold dark-grey text-shadow-grey">
            {{ __('Elimina Account') }}
        </h2>

        <p class="mt-4 text-sm  poppins-medium steel-blue">
            {{ __('Una volta eliminato il tuo account, tutte le sue risorse e i suoi dati verranno eliminati definitivamente. Prima di eliminare il tuo account, scarica tutti i dati o le informazioni che desideri conservare.') }}
        </p>
    </header>

    <button class="btn-edit-profile montserrat-bold text-uppercase"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Elimina Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="montserrat-bold dark-grey text-shadow-grey ">
                {{ __('Sei sicuro di voler eliminare il tuo account?') }}
            </h2>

            <p class="poppins-medium steel-blue">
                {{ __('Una volta eliminato il tuo account, tutte le sue risorse e i suoi dati verranno eliminati definitivamente. Inserisci la tua password per confermare che desideri eliminare definitivamente il tuo account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button class=" montserrat-bold text-uppercase" x-on:click="$dispatch('close')">
                    {{ __('Cancella') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 montserrat-bold text-uppercase">
                    {{ __('Elimina Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
