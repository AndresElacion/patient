<x-app-layout>
    <div class="flex">
        <!-- Sidebar for larger screens -->
        <x-side-nav />

        <!-- Main Content -->
        <div class="flex-1 justify-center items-center lg:ml-56 pt-20">
            <div class="mx-auto sm:px-6 lg:px-8">
                <h1 class=" ps-3 pe-2 py-2 border-l-4 rounded-xl ml-3 mb-4 border-indigo-400 text-start text-base font-medium text-indigo-700 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out">
                    Patient 
                    <span class="font-bold text-gray-700">/Profile</span>
                </h1>
                <div class="bg-white p-8 shadow-2xl rounded-xl">
                    <!-- Profile Section -->
                    <header class="flex flex-col space-y-6">
                        <!-- Patient Information -->
                        <div class="flex gap-8 items-center">
                            <!-- Profile Picture -->
                            <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-gray-300 shadow-md">
                                <img src="{{ asset('storage/' . $patient->image) }}" alt="Doctor Image" class="w-full h-full object-cover">
                            </div>

                            <!-- Basic Details -->
                            <div class="space-y-3">
                                <h1 class="text-3xl font-bold text-gray-800">{{ $patient->name }}</h1>
                                <p class="text-lg text-gray-600">{{ $patient->age }} Years, {{ $patient->gender }}</p>
                                <p class="text-md text-gray-500">{{ $patient->department }} - {{ $patient->specialty }}</p>
                            </div>
                        </div>

                        <!-- Contact and Address -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">
                            <div class="space-y-2">
                                <h3 class="text-sm text-gray-500 uppercase">Email</h3>
                                <p class="text-lg text-gray-800">{{ $patient->email }}</p>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-sm text-gray-500 uppercase">Contact Number</h3>
                                <p class="text-lg text-gray-800">{{ $patient->contactNumber }}</p>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-sm text-gray-500 uppercase">Date of Birth</h3>
                                <p class="text-lg text-gray-800">{{ $patient->dateOfBirth }}</p>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-sm text-gray-500 uppercase">Address</h3>
                                <p class="text-lg text-gray-800">{{ $patient->address }}</p>
                            </div>
                        </div>
                    </header>
                </div>

                <div class="bg-white p-8 shadow-2xl rounded-xl mt-5">
                    <x-patient-note 
                        :patient="$patient"
                    />
                </div>

                <div class="bg-white p-8 shadow-2xl rounded-xl mt-5">
                    <h3 class="text-sm text-gray-500 uppercase">Notes</h3>
                    <p class="text-lg text-gray-800">{{ $patient->notes }}</p>
                    <p class="text-lg text-gray-800">{{ $patient->updated_at->diffForHumans() }}</p>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
