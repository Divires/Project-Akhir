<?php
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <div class="flex min-h-screen" x-data="{ sidebarOpen: false, sidebarCollapsed: false }">

        @include('components.sidebar')
        
        <div class="flex-1 flex flex-col">

            @include('components.appbar')

            <main class="flex-1 p-6 md:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    @hasSection('page-header')
                        <div class="mb-8">
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                                @yield('title', 'Dashboard')
                            </h1>
                            @hasSection('description')
                                <p class="text-white/80 text-lg">
                                    @yield('description')
                                </p>
                            @endif
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>

        </div>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')
    </body>

</html>

