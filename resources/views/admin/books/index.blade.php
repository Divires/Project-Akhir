@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Overview aplikasi dan statistik terkini')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8 gap-4">
            <h1 class="text-xl font-medium text-[#2c2c2c]">Buku</h1>
            <a href="{{ route('admin.books.create') }}"
                class="flex items-center gap-2 bg-[#2d4fb1] text-[#fafafa] px-4 py-2 rounded hover:bg-[#24438a] transition">
                <span class="text-xl">＋</span>
                <span>Tambah Buku</span>
            </a>
        </div>
        <div class="border border-[#e2e2e2] rounded-lg p-6 bg-white shadow">
            <form method="GET" action="{{ route('admin.books.index') }}" class="mb-6">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                    class="w-full text-sm sm:w-96 h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" />
            </form>

            <div class="overflow-x-auto sm:overflow-x-visible">
                <table class="min-w-full rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#f6f6f6] text-left text-sm font-semibold h-12">
                            <th class="w-1/6 px-2">Kode Buku</th>
                            <th class="w-20 px-2">Sampul</th>
                            <th class="w-1/2 px-4">Judul Buku</th>
                            <th class="w-1/6 px-4">Stok</th>
                            <th class="w-1/6 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr class="h-20">
                                <td class="px-4 font-medium text-[#9b9a9a] whitespace-nowrap">{{ $book->code }}</td>
                                <td class=" px-4 py-2 text-center">
                                    @if($book->image)
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="Gambar Buku" class="w-16 h-16 object-cover rounded" />
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-4 font-medium text-[#9b9a9a]">{{ $book->title }}</td>
                                <td class="px-4 font-medium text-[#9b9a9a]">{{ $book->stock }}</td>
                                <td class="px-4 flex justify-center items-center gap-5 text-lg py-8">
                                    <a href="{{ route('admin.books.show', $book->id) }}" aria-label="Lihat"
                                        class="text-[#a1a0a0] hover:text-[#858484] transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                            <path
                                                d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('admin.books.edit', $book->id) }}" aria-label="Edit"
                                        class="text-[#2d4fb1] hover:text-[#1f3a7e] transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M12 20h9" />
                                            <path
                                                d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
                                        </svg>
                                    </a>

                                    <x-delete :action="route('admin.books.destroy', $book->id)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-400 py-4">Tidak ada buku ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection