<section class="mt-5">
    <div class="bg-white shadow-lg hidden sm:block rounded-xl border border-slate-200 relative">
        <header class="px-5 flex justify-between items-center">
          <div>
            <h2 class="font-semibold text-slate-800 uppercase">Patient: <span class="text-slate-500 text-xl">1</span></h2>
          </div>
            <div>
                <form action="#">
                    <div class="relative border border-none m-4 rounded-xl">
                        <div class="absolute top-3 left-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="search"
                            class="h-12 w-full pl-10 pr-16 rounded-lg focus:shadow focus:outline-none"
                            placeholder="Patient"
                        />
                        <div class="absolute top-2 right-1">
                            <button
                                type="submit"
                                class="h-8 w-16 text-white rounded-lg bg-blue-500 hover:bg-blue-600"
                            >
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </header>

        <div class="rounded-lg border border-gray-200">
            <div class="overflow-x-auto rounded-t-lg">
              <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                  <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date of Birth</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Type</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Status</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
                  </tr>
                </thead>
          
                <tbody class="divide-y divide-gray-200 text-center">
                  <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">John Doe</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">General Check-up</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">In-Progress</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                      <a href="#" class="inline-block rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">
                        View
                      </a>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
            <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
              {{-- This goes for pagination --}}
            </div>
        </div> 
    </div>
</section>