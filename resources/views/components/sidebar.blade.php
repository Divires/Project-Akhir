@php
    $current = request()->segment(1) ?? '';
@endphp

<aside
    class="fixed inset-y-0 left-0 z-40 w-80 bg-white/95 backdrop-blur-sm shadow-xl border-r border-white/20 transform transition-transform duration-300
           lg:translate-x-0 lg:static lg:flex-shrink-0"
    :class="{
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen,
        'lg:w-20': sidebarCollapsed,
        'lg:w-80': !sidebarCollapsed
    }
    ">


    <div class="flex justify-end lg:hidden p-4">
        <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Logo (sembunyi di mobile) --}}
    <div class="mt-[70px] mb-12 text-[#2d4fb1] font-bold text-[28px] font-cinzel flex justify-center w-full">
        READIFY
    </div>

    {{-- Menu Atas --}}
    <div class="flex flex-col gap-[15px] w-full px-6">
        @php
            $menusTop = [
                [
                    'name' => 'Dashboard',
                    'url' => 'dashboard',
                    'icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="stroke-current">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8.557 2.75H4.682A1.93 1.93 0 0 0 2.75 4.682v3.875a1.94 1.94 0 0 0 1.932 1.942h3.875a1.94 1.94 0 0 0 1.942-1.942V4.682A1.94 1.94 0 0 0 8.557 2.75m10.761 0h-3.875a1.94 1.94 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942V4.682a1.93 1.93 0 0 0-1.932-1.932m0 10.75h-3.875a1.94 1.94 0 0 0-1.942 1.933v3.875a1.94 1.94 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942v-3.875a1.93 1.93 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.93 1.93 0 0 0 1.932 1.932h3.875a1.94 1.94 0 0 0 1.942-1.932v-3.875a1.94 1.94 0 0 0-1.942-1.942" />
                    </svg>',
                ],
                [
                    'name' => 'Buku',
                    'url' => 'buku',
                    'icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.756 16.358a1.09 1.09 0 0 0 1.154 1.198a16.6 16.6 0 0 1 3.54.338c1.635.2 3.197.794 4.552 1.731V6.448A10.16 10.16 0 0 0 7.45 4.694a16.6 16.6 0 0 0-3.605-.316a1.09 1.09 0 0 0-1.09 1.09zm18.492 0a1.09 1.09 0 0 1-1.154 1.154a16.6 16.6 0 0 0-3.54.338a10.16 10.16 0 0 0-4.552 1.775V6.448a10.16 10.16 0 0 1 4.552-1.754a16.6 16.6 0 0 1 3.605-.316a1.09 1.09 0 0 1 1.089 1.155zM5.621 8.234h1.252m-1.252 6.011h1.834M5.78 11.24h3.35"/>
                    </svg>',
                ],
                [
                    'name' => 'Siswa',
                    'url' => 'siswa',
                    'icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1">
                            <path d="M19.727 20.447c-.455-1.276-1.46-2.403-2.857-3.207S13.761 16 12 16s-3.473.436-4.87 1.24s-2.402 1.931-2.857 3.207"/>
                            <circle cx="12" cy="8" r="4"/>
                        </g>
                    </svg>',
                ],
                [
                    'name' => 'Peminjaman',
                    'url' => 'peminjaman',
                    'icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.692 7.889h4.52M11.692 12h4.52m-4.52 4.111h4.52M8.066 8.506a.617.617 0 1 0 0-1.234a.617.617 0 0 0 0 1.234m0 4.111a.617.617 0 1 0 0-1.234a.617.617 0 0 0 0 1.234m0 4.111a.617.617 0 1 0 0-1.234a.617.617 0 0 0 0 1.234"/>
                            <rect width="18.5" height="18.5" x="2.75" y="2.75" rx="6"/>
                        </g>
                    </svg>',
                ],
            ];
            $menuBottom = [
                'name' => 'Keluar',
                'url' => 'login',
                'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1">
                        <path stroke-linejoin="round" d="M13.477 21.245H8.34a4.92 4.92 0 0 1-5.136-4.623V7.378A4.92 4.92 0 0 1 8.34 2.755h5.136"/>
                        <path stroke-miterlimit="10" d="M20.795 12H7.442"/>
                        <path stroke-linejoin="round" d="m16.083 17.136l4.404-4.404a1.04 1.04 0 0 0 0-1.464l-4.404-4.404"/>
                    </g>
                </svg>',
            ];
        @endphp

        @foreach ($menusTop as $menu)
            @php
                $isActive = $current === $menu['url'];
            @endphp
            <a href="{{ url($menu['url']) }}"
                class="flex items-center w-[235px] h-[44px] rounded-md px-[25px] ml-[8px]
                    text-[#2c2c2c] hover:bg-[#deebfb] hover:text-[#2d4fb1]
                    hover:stroke-[#2d4fb1] transition-colors duration-200
                    {{ $isActive ? 'bg-[#deebfb] text-[#2d4fb1]' : '' }}">
                <div class="w-6 h-6 mr-4 stroke-current fill-current"
                    style="min-width: 24px; min-height: 24px; display: flex; align-items: center; justify-content: center;">
                    {!! $menu['icon'] !!}
                </div>
                <span class="text-[15px] font-medium">{{ $menu['name'] }}</span>
            </a>
        @endforeach
    </div>

    {{-- Menu Bawah --}}
    <div class="flex flex-col mt-50 w-full px-6">
        @php $isActive = ($current === $menuBottom['url']); @endphp
        <a href="{{ url($menuBottom['url']) }}"
            class="flex items-center w-[235px] h-[44px] rounded-md px-[25px] ml-[8px]
                text-[#2c2c2c] hover:bg-red-100 hover:text-red-500
                hover:stroke-[#2d4fb1] transition-colors duration-200
                {{ $isActive ? 'bg-red-100 text-red-500' : '' }}">
            <div class="w-6 h-6 mr-4 stroke-current"
                style="min-width: 24px; min-height: 24px; display: flex; align-items: center; justify-content: center;">
                {!! $menuBottom['icon'] !!}
            </div>
            <span class="text-[15px] font-medium">{{ $menuBottom['name'] }}</span>
        </a>
    </div>
<style>
    /* Optional: font Cinzel jika mau sama seperti logo sebelumnya */
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap');
    .font-cinzel {
        font-family: 'Cinzel', serif;
    }
</style>
</aside>
