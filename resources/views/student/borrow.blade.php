@extends('layouts.appstudent')

@section('title', 'READIFY')
@section('subtitle', 'Overview aplikasi dan statistik terkini')

@section('content')
    <div>

        <div class="border border-[#e2e2e2] rounded-lg p-6 bg-white shadow">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <input type="text" placeholder="Search..."
                    class="w-full text-sm sm:w-96 h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" />

                <div class="flex gap-2">
                    <a href="{{ route('student.borrow', ['status' => 'Dipinjam']) }}">
                        <button id="btn-dipinjam"
                            class="px-4 h-10 text-sm rounded font-medium text-yellow-800 {{ request('status') === 'Dipinjam' ? 'bg-yellow-100' : 'border border-yellow-800 hover:bg-yellow-100' }} transition">
                            Dipinjam
                        </button>
                    </a>
                    <a href="{{ route('student.borrow', ['status' => 'Dikembalikan']) }}">
                        <button id="btn-dikembalikan"
                            class="px-4 h-10 text-sm rounded font-medium text-green-800 {{ request('status') === 'Dikembalikan' ? 'bg-green-100' : 'border border-green-800 hover:bg-green-100' }} transition">
                            Dikembalikan
                        </button>
                    </a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($borrows as $borrow)
                            <tr class="h-20 font-medium text-[#9b9a9a]">
                                <td class="px-4">{{ $borrow->student->name }}</td>
                                <td class="px-4">{{ $borrow->book->title }}</td>
                                <td class="px-4">{{ $borrow->borrow_date }}</td>
                                <td class="px-4">{{ $borrow->expected_return_date }}</td>
                                <td class="px-4">{{ $borrow->actual_return_date ?? '-' }}</td>
                                <td class="px-4">Rp{{ number_format($borrow->denda, 0, ',', '.') }}</td>
                                <td class="px-4">
                                    @if ($borrow->status === 'Dipinjam')
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                            Dipinjam
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                            Dikembalikan
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-[#9b9a9a] py-8">
                                    Tidak ada data peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection