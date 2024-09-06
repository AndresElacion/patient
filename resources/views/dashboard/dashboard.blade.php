<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex h-screen">
        <!-- Sidebar for larger screens -->
        <x-side-nav />

        <!-- Main Content -->
        <div class="flex-1 justify-center items-center">
            <div class="py-12">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-5 shadow-lg rounded-lg">
                        <x-welcome />
                        <x-hero-counter />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
