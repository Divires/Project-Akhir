@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Buku > Detail Buku')

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="{{ route('admin.books.index') }}" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Buku</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Detail Buku</span>
        </div>

        <!-- Detail Buku -->
        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode Buku -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Kode Buku</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">{{ $book->code }}</p>
                </div>

                <!-- Judul Buku -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Judul Buku</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">{{ $book->title }}</p>
                </div>

                <!-- Stok Buku -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Stok Buku</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">{{ $book->stock }}</p>
                </div>

                <!-- Gambar Buku -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Gambar Buku</label>
                    <div class="border border-[#e2e2e2] rounded p-2 bg-gray-100">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="Gambar Buku" class="h-32 object-contain mx-auto" />
                        @else
                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                        @endif
                    </div>
                </div>

                <!-- Deskripsi Buku -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Deskripsi Buku</label>
                    <div class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">
                        {{ $book->description ?? '-' }}
                    </div>
                </div>

                <!-- Tombol -->
                <div class="md:col-span-2 pt-4">
                    <a href="{{ route('admin.books.index') }}"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection