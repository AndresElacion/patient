<section class="p-6 bg-white shadow-lg rounded-lg mb-6">
    <form method="POST" action="{{ route('billing.store', $patient->id) }}">
        @csrf
        <div class="grid gap-4">
            <!-- Service -->
            <div>
                <x-input-label for="service" :value="__('Service')" />
                <x-text-input id="service" class="block mt-1 w-full lg:w-5/12" type="text" name="service" :value="old('service')" autofocus autocomplete="service" />
                <x-input-error :messages="$errors->get('service')" class="mt-2" />
            </div>
    
            <!-- Amount -->
            <div>
                <x-input-label for="amount" :value="__('Amount')" />
                <x-text-input id="amount" class="block mt-1 w-full lg:w-5/12" type="text" name="amount" :value="old('amount')" autocomplete="amount" />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Billing Date -->
            <div>
                <x-input-label for="billingDate" :value="__('Billing Date')" />
                <x-text-input id="billingDate" class="block mt-1 w-full lg:w-5/12" type="date" name="billingDate" :value="old('billingDate')" autocomplete="billingDate" />
                <x-input-error :messages="$errors->get('billingDate')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</section>