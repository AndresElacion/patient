<section class="mt-5" x-data="patientSearch()">
    <div class="bg-white shadow-lg hidden sm:block rounded-xl border border-slate-200 relative">
        <header class="px-5 flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-slate-800 uppercase">Patient List: <span class="text-slate-500 text-xl" x-text="filteredPatients.length"></span></h2>
            </div>
            <div>
                <div class="relative border border-none m-4 rounded-xl">
                    <div class="absolute top-3 left-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="searchQuery"
                        @input="filterPatients"
                        class="h-12 w-full pl-10 pr-16 rounded-lg focus:shadow focus:outline-none"
                        placeholder="Search Doctor"
                    />
                </div>
            </div>
        </header>
  
        <div class="rounded-lg border border-gray-200">
            <div class="overflow-x-auto rounded-t-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date of Birth</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Age</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gender</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Department</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-center">
                        <!-- Loop over filtered patients -->
                        <template x-for="patient in filteredPatients" :key="patient.id">
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900" x-text="patient.name"></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700" x-text="patient.dateOfBirth"></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700" x-text="patient.age"></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700" x-text="patient.gender"></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700" x-text="patient.department"></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                    <a :href="`/patient/${patient.id}/edit`" class="inline-block rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">
                                        View
                                    </a>
                                    <a :href="`/patients/${patient.id}/billing`" class="inline-block rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">
                                        Bill
                                    </a>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
  
            <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                {{ $patients->links() }}
            </div>
        </div> 
    </div>
  </section>
  
  <script>
    function patientSearch() {
        return {
            searchQuery: '',
            patients: @json($patients->items()),
            filteredPatients: @json($patients->items()),
  
            filterPatients() {
                this.filteredPatients = this.patients.filter(patient =>
                    patient.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                );
            }
        }
    }
  </script>
  