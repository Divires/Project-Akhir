<header class="bg-white/95 backdrop-blur-sm shadow-sm border-b border-white/20 sticky top-0 z-20 w-full">
    <div class="flex items-center justify-between px-4 md:px-6 py-3">

        <div class="flex items-center gap-3">
            <button 
                @click="sidebarOpen = !sidebarOpen"
                class="text-gray-700 focus:outline-none md:hidden"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="flex flex-col">

                <h1 class="text-base sm:text-lg md:text-2xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-xs sm:text-sm text-gray-500">Hai, {{ Auth::user()->name }}</p>

            </div>
        </div>

        <div class="flex items-center gap-3">
            <button aria-label="Notifikasi" class="text-[#2c2c2c] w-[30px] h-[30px] flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36" fill="currentColor">
                    <path d="M32.51 27.83A14.4 14.4 0 0 1 30 24.9a12.6 12.6 0 0 1-1.35-4.81v-4.94A10.81 10.81 0 0 0 19.21 4.4V3.11a1.33 1.33 0 1 0-2.67 0v1.31a10.81 10.81 0 0 0-9.33 10.73v4.94a12.6 12.6 0 0 1-1.35 4.81a14.4 14.4 0 0 1-2.47 2.93a1 1 0 0 0-.34.75v1.36a1 1 0 0 0 1 1h27.8a1 1 0 0 0 1-1v-1.36a1 1 0 0 0-.34-.75Z" />
                    <path d="M18 34.28A2.67 2.67 0 0 0 20.58 32h-5.26A2.67 2.67 0 0 0 18 34.28" />
                </svg>
            </button>

            <div class="h-6 w-px bg-[#2c2c2c]"></div>

            <a href="{{ route('admin.profile.index') }}" aria-label="Profile" 
               class="rounded-full bg-gray-300 w-[30px] h-[30px] flex items-center justify-center overflow-hidden">
               @if(Auth::user()->photo)
                  <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto Profil" class="w-full h-full object-cover rounded-full" />
               @else
                  <span class="text-sm font-semibold text-gray-700">
                     {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                  </span>
               @endif
            </a>
        </div>
    </div>
</header>