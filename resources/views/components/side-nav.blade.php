<div class="min-h-screen flex flex-col sm:flex-row bg-gray-100 shadow-lg">
    <!-- Sidebar - hidden on small screens by default -->
     <div class="w-full lg:w-56 bg-white overflow-hidden lg:flex lg:flex-col transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full lg:relative fixed">
        <div class="px-12 py-10 flex flex-col">
          <div class="h-auto">
            <!-- Sidebar Links -->
            <x-responsive-nav-link href="#" :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Patient</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Patient Profile</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Doctor</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Staff</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Role</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Department</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Billing</x-responsive-nav-link>
        </div>
      </div>
    </div>
</div>