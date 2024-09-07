<section class="mt-5">
    <div class="bg-white shadow-lg rounded-xl border border-slate-200 relative">
        <header class="p-5 flex justify-between items-center">
          <div>
            <h2 class="font-semibold text-slate-800 uppercase">Doctor: <span class="text-slate-500 text-xl">{{ $totalDoctors }}</span></h2>
          </div>
            <div class="hover:rotate-180 hover:scale-125 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                </svg>
            </div>
        </header>

        <div class="rounded-lg border border-gray-200">
          <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
              <thead class="ltr:text-left rtl:text-right">
                <tr>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Department</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Specialty</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Status</th>
                </tr>
              </thead>
        
              <tbody class="divide-y divide-gray-200 text-center">
                @foreach ( $doctors as $doctor)
                  <tr>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{ $doctor->name }}</td>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{ $doctor->department }}</td>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{ $doctor->occupation }}</td>
                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                        @if (true) {{-- Change this to logged in doctor --}}
                          <span class="inline-block w-3 h-3 mr-2 border border-green-600 bg-green-500 animate-pulse rounded-full"></span>
                          Online
                        @else
                          <span class="inline-block w-3 h-3 mr-2 border border-gray-600 bg-gray-500 rounded-full"></span>
                          Online
                        @endif
                    </td>
                  </tr>
                @endforeach
                
  
                
              </tbody>
            </table>
          </div>
        </div> 
    </div>
</section>