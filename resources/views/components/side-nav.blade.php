<div class="min-h-screen flex flex-row bg-gray-100 shadow-lg">
    <div class="flex flex-col sm:w-56 w-full bg-white overflow-hidden">
      <div class="px-12 py-10 flex flex-col">
        <div class="h-auto">
            <a href="#" :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Dashboard</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Patient</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Patient Profile</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Doctor</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Staff</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Role</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Department</a>
            <a href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Billing</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="inline-flex relative items-center p-2 my-2 w-full sm:w-24 text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-red-600 text-red-500 transition-transform">
                    Sign out
                </button>
            </form>
        </div>
      </div>
    </div>
</div>