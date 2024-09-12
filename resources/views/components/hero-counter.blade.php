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
        <p class="text-4xl font-extrabold text-slate-900">1</p>
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
                <h1 class="text-xl font-semibold text-slate-700">Revenue</h1>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>
            </div>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalRevenue }}</p>
        <hr class="my-4 border-gray-300">
    </div>
</div>
