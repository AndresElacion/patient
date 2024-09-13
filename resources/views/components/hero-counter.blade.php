<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-12">
    <!-- Card 1 -->
    <div class="flex flex-col justify-between p-6 bg-white shadow-lg rounded-lg border border-slate-200 h-full w-full">
        <div class="flex justify-between items-center space-x-2 mb-4">
            <div>
                <h1 class="text-xl font-semibold text-slate-700">Patient</h1>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalPatients }}</p>
        <hr class="my-4 border-gray-300">
    </div>
    
    <!-- Card 2 -->
    <div class="flex flex-col justify-between p-6 bg-white shadow-lg rounded-lg border border-slate-200 h-full w-full">
        <div class="flex justify-between items-center space-x-2 mb-4">
            <div>
                <h1 class="text-xl font-semibold text-slate-700">Appointment</h1>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                </svg>
            </div>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalAppointment }}</p>
        <hr class="my-4 border-gray-300">
    </div>
    
    <!-- Card 3 -->
    <div class="flex flex-col justify-between p-6 bg-white shadow-lg rounded-lg border border-slate-200 h-full w-full">
        <div class="flex justify-between items-center space-x-2 mb-4">
            <div>
                <h1 class="text-xl font-semibold text-slate-700">Doctor</h1>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalDoctors }}</p>
        <hr class="my-4 border-gray-300">
    </div>
    
    <!-- Card 4 -->
    <div class="flex flex-col justify-between p-6 bg-white shadow-lg rounded-lg border border-slate-200 h-full w-full">
        <div class="flex justify-between items-center space-x-2 mb-4">
            <div>
                <h1 class="text-xl font-semibold text-slate-700">Nurses</h1>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                  </svg>                  
            </div>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalStaffs }}</p>
        <hr class="my-4 border-gray-300">
    </div>
</div>
