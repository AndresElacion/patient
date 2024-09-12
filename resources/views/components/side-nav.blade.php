<div class="bg-white shadow-lg pt-16">
    <!-- Sidebar - hidden on small screens by default -->
     <div class="w-56 bg-white hidden lg:block lg:fixed lg:h-full">
        <div class="px-6 py-10">
          <div class="">
            <!-- Sidebar Links -->
            <x-responsive-nav-link href="#" :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Dashboard</x-responsive-nav-link>

            <x-responsive-nav-link href="#" :href="route('register')" :active="request()->routeIs('register')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Add Profile</x-responsive-nav-link>

            <x-responsive-nav-link href="#" :href="route('patient.index')" :active="request()->routeIs('patient.index')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Patient</x-responsive-nav-link>

            <x-responsive-nav-link href="#" :href="route('doctor.index')" :active="request()->routeIs('doctor.index')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Doctor</x-responsive-nav-link>

            <x-responsive-nav-link href="#" :href="route('staff.index')" :active="request()->routeIs('staff.index')" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Staff</x-responsive-nav-link>

            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Role</x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" class="inline-flex relative items-center p-2 my-2 w-full text-sm sm:text-md font-medium rounded-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600 text-gray-500 transition-transform">Billing</x-responsive-nav-link>
        </div>
      </div>
    </div>
</div>