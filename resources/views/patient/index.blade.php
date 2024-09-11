<x-app-layout>
    <div class="flex">
        <x-side-nav />
        <div class="flex-1">
            <div class="lg:ml-48 pt-24">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="pb-12">
                        <div class="mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="bg-white p-5 shadow-lg rounded-lg">
                                <x-all-patient 
                                    :patients="$patients"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
