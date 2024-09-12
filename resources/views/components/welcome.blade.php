<section>
    <header>
        <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-lg overflow-hidden">
            <!-- Background illustration -->
            <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">
              <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
                  <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
                  <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
                  <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                    <stop stop-color="#A5B4FC" offset="0%" />
                    <stop stop-color="#818CF8" offset="100%" />
                  </linearGradient>
                  <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                    <stop stop-color="#4338CA" offset="0%" />
                    <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                  </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                  <g transform="rotate(64 36.592 105.604)">
                    <mask id="welcome-d" fill="#fff">
                      <use xlink:href="#welcome-a" />
                    </mask>
                    <use fill="url(#welcome-b)" xlink:href="#welcome-a" />
                    <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
                  </g>
                  <g transform="rotate(-51 91.324 -105.372)">
                    <mask id="welcome-f" fill="#fff">
                      <use xlink:href="#welcome-e" />
                    </mask>
                    <use fill="url(#welcome-b)" xlink:href="#welcome-e" />
                    <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
                  </g>
                  <g transform="rotate(44 61.546 392.623)">
                    <mask id="welcome-h" fill="#fff">
                      <use xlink:href="#welcome-g" />
                    </mask>
                    <use fill="url(#welcome-b)" xlink:href="#welcome-g" />
                    <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
                  </g>
                </g>
              </svg>
            </div>
        
            <!-- Content -->
            <div class="relative">
              <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1">{{ __('Hello') }} {{ Auth::user()->name }} 👋</h1>
              <p>{{ __('Have a nice day at work!') }}</p>
            </div>

            <a href="{{ route('patient.index') }}" class="mt-4 inline-flex justify-between items-center rounded-lg shadow-lg bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
              </svg>
              <span class="text-sm font-medium text-md pl-1">Setup Appointment</span>
            </a>
        </div>
    </header>
</section>