@extends('layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Overview aplikasi dan statistik terkini')

@section('content')
    <div class="space-y-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            <!-- Total Member -->
            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md text-[#2c2c2c]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs sm:text-sm text-[#2c2c2c]/70">Total Member</p>
                        <p class="text-xl sm:text-2xl font-bold">1,234</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="purple"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5m-4 9.5A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517c4.278.699 8.642.699 12.92 0a1.54 1.54 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34q-.28.001-.544.086l-.866.283a7.25 7.25 0 0 1-4.5 0l-.866-.283a1.8 1.8 0 0 0-.543-.086z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Buku Tersedia -->
            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md text-[#2c2c2c] text-pink-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs sm:text-sm text-[#2c2c2c]/70">Buku Tersedia</p>
                        <p class="text-xl sm:text-2xl  text-[#2c2c2c] font-bold">215</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="deeppink"
                            viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M4 8a4.5 4.5 0 0 1 4.5-4.5h10A1.5 1.5 0 0 1 20 5v15a1 1 0 0 1-1 1H7.5a3.5 3.5 0 0 1-3.465-3H4zm14.5 7.5h-11a2 2 0 1 0 0 4h11zM8.25 8A.75.75 0 0 1 9 7.25h7a.75.75 0 0 1 0 1.5H9A.75.75 0 0 1 8.25 8M9 10.25a.75.75 0 0 0 0 1.5h5a.75.75 0 0 0 0-1.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Peminjaman -->
            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md text-[#2c2c2c]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs sm:text-sm text-[#2c2c2c]/70">Peminjaman</p>
                        <p class="text-xl sm:text-2xl font-bold">892</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="dodgerblue"
                            fill="none" viewBox="0 0 24 24">
                            <g stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.692 7.889h4.52M11.692 12h4.52m-4.52 4.111h4.52M8.066 8.506a.617.617 0 1 0 0-1.234a.617.617 0 0 0 0 1.234m0 4.111a.617.617 0 1 0 0-1.234a.617.617 0 0 0 0 1.234m0 4.111a.617.617 0 1 0 0-1.234a.617.617 0 0 0 0 1.234" />
                                <rect width="18.5" height="18.5" x="2.75" y="2.75" rx="6" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pengembalian -->
            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md text-[#2c2c2c]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs sm:text-sm text-[#2c2c2c]/70">Pengembalian</p>
                        <p class="text-xl sm:text-2xl font-bold">156</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-sky-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="skyblue"
                            viewBox="0 0 1024 1024">
                            <path fill="currentColor"
                                d="M688 312v-48c0-4.4-3.6-8-8-8H296c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h384c4.4 0 8-3.6 8-8m-392 88c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zm376 116c-119.3 0-216 96.7-216 216s96.7 216 216 216s216-96.7 216-216s-96.7-216-216-216m107.5 323.5C750.8 868.2 712.6 884 672 884s-78.8-15.8-107.5-44.5S520 772.6 520 732s15.8-78.8 44.5-107.5S631.4 580 672 580s78.8 15.8 107.5 44.5S824 691.4 824 732s-15.8 78.8-44.5 107.5M761 656h-44.3c-2.6 0-5 1.2-6.5 3.3l-63.5 87.8l-23.1-31.9a7.92 7.92 0 0 0-6.5-3.3H573c-6.5 0-10.3 7.4-6.5 12.7l73.8 102.1c3.2 4.4 9.7 4.4 12.9 0l114.2-158c3.9-5.3.1-12.7-6.4-12.7M440 852H208V148h560v344c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8V108c0-17.7-14.3-32-32-32H168c-17.7 0-32 14.3-32 32v784c0 17.7 14.3 32 32 32h272c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        <div class="bg-white mt-6 rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-4">Peminjaman Bulanan</h3>
            <canvas id="barChart" height="150"></canvas>
        </div>

    </div>

    @push('scripts')
<script>
    const ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Peminjaman',
                data: [120, 150, 180, 90, 200, 170, 190, 160, 220, 180, 200, 170],
                backgroundColor: 'rgba(59, 130, 246, 0.7)', // biru
                borderRadius: 6,
                barThickness: 30,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                grid: {
                    display: false
                }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
@endsection