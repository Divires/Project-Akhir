@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Peminjaman > Pinjam Baru')

@section('content')
    <div>
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="{{ route('admin.borrow.index') }}" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Peminjaman</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Pinjam Baru</span>
        </div>

        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <form action="{{ route('admin.borrow.store') }}" method="POST" class="grid grid-cols-1 gap-6">
                @csrf

                <div>
                    <label for="nis" class="block text-sm font-medium text-[#2c2c2c] mb-1">NIS</label>
                    <input type="text" id="nis" name="nis"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan NIS siswa" value="{{ old('nis') }}">
                    @error('nis')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="book_code" class="block text-sm font-medium text-[#2c2c2c] mb-1">Kode Buku</label>
                    <input type="text" id="book_code" name="book_code"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan kode buku" value="{{ old('book_code') }}">
                    @error('book_code')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="borrow_date" class="block text-sm font-medium text-[#2c2c2c] mb-1">Tanggal Pinjam</label>
                    <input type="date" id="borrow_date" name="borrow_date"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        value="{{ old('borrow_date', date('Y-m-d')) }}">
                    @error('borrow_date')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 flex gap-4">
                    <a href="{{ route('admin.borrow.index') }}"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Cancel
                    </a>
                    <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                        Simpan Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection