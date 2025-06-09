<header class="bg-white/95 backdrop-blur-sm shadow-sm border-b border-white/20 sticky top-0 z-20 w-full">
    <div class="flex items-center justify-between px-4 md:px-6 py-3">

        <div class="flex items-center gap-3">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Page Title -->
            <div class="flex flex-col">
                <h1 class="text-base sm:text-lg md:text-xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-xs sm:text-sm text-gray-500">Hai Riana</p>
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center gap-3">
            <!-- Notification Button -->
            <button aria-label="Notifikasi" class="text-[#2c2c2c] w-[35px] h-[35px] flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1">
                        <path
                            d="M11.962 17.986h6.81a1.555 1.555 0 0 0 1.512-2.175c-.36-1.088-1.795-2.393-1.795-3.677c0-2.85 0-3.6-1.404-5.276a5 5 0 0 0-1.653-1.283l-.783-.38a1.1 1.1 0 0 1-.511-.73a2.023 2.023 0 0 0-2.176-1.707a2.023 2.023 0 0 0-2.12 1.707a1.09 1.09 0 0 1-.567.73l-.783.38A5 5 0 0 0 6.84 6.858c-1.403 1.676-1.403 2.426-1.403 5.276c0 1.284-1.37 2.458-1.73 3.611c-.217.697-.337 2.241 1.48 2.241z" />
                        <path d="M15.225 17.986a3.2 3.2 0 0 1-3.263 3.263A3.195 3.195 0 0 1 8.7 17.986" />
                    </g>
                </svg>
            </button>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-300"></div>

            <!-- Profile Button -->
            <!-- Profile Button (Frontend Only) -->
            <a href="/profil" aria-label="Profile">
                <img src="https://i.pinimg.com/736x/f9/75/46/f9754682a71ebaa3beedf21f733a073c.jpg" alt="Profil"
                    class="rounded-full w-[30px] h-[30px] object-cover border border-gray-400" />
            </a>

        </div>
    </div>
</header>
