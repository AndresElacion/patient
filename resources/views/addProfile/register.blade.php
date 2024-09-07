<x-app-layout>
    <div class="flex">
        <!-- Sidebar for larger screens -->
        <x-side-nav />

        <!-- Main Content -->
        <div class="flex-1 justify-center items-center lg:ml-56 pt-24">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-5 shadow-lg rounded-lg">
                    @include('auth.register')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
