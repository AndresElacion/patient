<section>
    <header class="flex flex-col">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>    
        </div>

        <div class="mt-2">
            <img src="{{ asset('storage/' . $user->image) }}" alt="Doctor Image" class="w-36 h-32 border border-blue-500 rounded-full"> 
        </div>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="contactNumber" :value="__('Contact Number')" />
                <x-text-input id="contactNumber" class="block mt-1 w-full" type="text" name="contactNumber" :value="old('contactNumber')" autocomplete="username" />
                <x-input-error :messages="$errors->get('contactNumber')" class="mt-2" />
            </div>

            <!-- Age -->
            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- DOB -->
            <div>
                <x-input-label for="dateOfBirth" :value="__('Date of Birth')" />
                <x-text-input id="dateOfBirth" class="block mt-1 w-full" type="date" name="dateOfBirth" :value="old('dateOfBirth')" />
                <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div>
                <x-input-label for="gender" :value="__('Gender')" />
                <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Address -->
            <div>
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Image -->
            <div>
                <x-input-label for="image" :value="__('Profile Image')" />
                <input id="image" class="block mt-1 w-full border p-1 rounded-md border-gray-300" type="file" name="image" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="hidden"
                            name="password"
                            autocomplete="new-password"
                            value="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-primary-button>
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</section>
