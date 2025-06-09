@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Overview aplikasi dan statistik terkini')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8 gap-4">
            <h1 class="text-xl font-medium text-[#2c2c2c]">Peminjaman</h1>
            <a href="/createpeminjaman"
                class="flex items-center gap-2 bg-[#2d4fb1] text-[#fafafa] px-4 py-2 rounded hover:bg-[#24438a] transition">
                <span class="text-xl">＋</span>
                <span>Pinjam Baru</span>
            </a>
        </div>

        <div class="border border-[#e2e2e2] rounded-lg p-6 bg-white shadow">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <input type="text" placeholder="Search..."
                    class="w-full text-sm sm:w-96 h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" />

                <div class="flex gap-2">
                    <button id="btn-dipinjam" onclick="setStatus('dipinjam')"
                        class="px-4 h-10 text-sm rounded font-medium text-yellow-800 border border-yellow-800 transition hover:bg-yellow-100">
                        Dipinjam
                    </button>
                    <button id="btn-dikembalikan" onclick="setStatus('dikembalikan')"
                        class="px-4 h-10 text-sm rounded font-medium text-green-800 border border-green-800 transition hover:bg-green-100">
                        Dikembalikan
                    </button>
                </div>

            </div>

            <div class="overflow-x-auto sm:overflow-x-visible">
                <table class="min-w-full rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#f6f6f6] text-left text-sm font-semibold h-12">
                            <th class="px-4">Siswa</th>
                            <th class="px-4">Buku</th>
                            <th class="px-4">Tgl Pinjam</th>
                            <th class="px-4">Jatuh Tempo</th>
                            <th class="px-4">Tgl Kembali</th>
                            <th class="px-4">Denda</th>
                            <th class="px-4">Status</th>
                            <th class="px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="h-20 font-medium text-[#9b9a9a]">
                            <td class="px-4">Ahmad Fauzi</td>
                            <td class="px-4">Laskar Pelangi</td>
                            <td class="px-4">2025-06-01</td>
                            <td class="px-4">2025-06-08</td>
                            <td class="px-4">-</td>
                            <td class="px-4">Rp0</td>
                            <td class="px-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                    Dipinjam
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <a href="/peminjaman/pengembalian"
                                    class="px-4 py-2 text-sm bg-[#2d4fb1] text-white rounded hover:bg-[#1f3a7e] transition">
                                    Kembalikan
                                </a>
                            </td>

                        </tr>

                        <tr class="h-20 font-medium text-[#9b9a9a]">
                            <td class="px-4">Dewi Lestari</td>
                            <td class="px-4">Negeri 5 Menara</td>
                            <td class="px-4">2025-05-20</td>
                            <td class="px-4">2025-05-27</td>
                            <td class="px-4">2025-05-29</td>
                            <td class="px-4">Rp4.000</td>
                            <td class="px-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    Dikembalikan
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <span class="text-[#9b9a9a] text-sm italic">Selesai</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function setStatus(status) {
            const btnDipinjam = document.getElementById('btn-dipinjam');
            const btnDikembalikan = document.getElementById('btn-dikembalikan');

            if (status === 'dipinjam') {
                btnDipinjam.className = 'px-4 h-10 text-sm rounded font-medium text-yellow-800 bg-yellow-100 transition';
                btnDikembalikan.className =
                    'px-4 h-10 text-sm rounded font-medium text-green-800 border border-green-800 transition hover:bg-green-100';
            } else {
                btnDikembalikan.className = 'px-4 h-10 text-sm rounded font-medium text-green-800 bg-green-100 transition';
                btnDipinjam.className =
                    'px-4 h-10 text-sm rounded font-medium text-yellow-800 border border-yellow-800 transition hover:bg-yellow-100';
            }
        }
        // Default status
        setStatus('dipinjam');
    </script>
@endsection
