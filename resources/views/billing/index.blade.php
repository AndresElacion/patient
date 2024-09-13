<x-app-layout>
    <div class="flex flex-col lg:flex-row">
        <x-side-nav class="lg:w-56" />
        <!-- Main Content -->
        <div class="flex-1 p-4 lg:ml-56 lg:pt-24">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-5 shadow-lg rounded-lg">
                    <div class="">
                        <!-- Billing Create Component -->
                        <x-billing-create 
                            :patient="$patient"
                        />
                        
                        <!-- Billing Index Component -->
                        <x-billing-index 
                            :bills="$bills" 
                            :patient="$patient"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>