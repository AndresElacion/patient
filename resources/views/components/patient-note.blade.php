<section>
    <form method="POST" action="{{ route('patient.update', $patient->id) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="">
            <!-- Note -->
            <div>
                <x-input-label for="notes" :value="__('Add note to patient')" />
                <x-textarea id="notes" rows="4" class="block mt-1 w-full" type="text" name="notes" :value="old('notes')" required autofocus autocomplete="notes" />
                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</section>
