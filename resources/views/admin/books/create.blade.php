@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Buku > Tambah Buku')

@section('content')
    <div>
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="/buku" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Buku</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Tambah Buku</span>
        </div>

        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data"
                  class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <div>
                    <label for="kode" class="block text-sm font-medium text-[#2c2c2c] mb-1">Kode Buku</label>
                    <input type="text" id="kode" name="kode" value="{{ $newCode }}" readonly
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 bg-gray-100 text-gray-600 cursor-not-allowed" />
                </div>

                
                <div>
                    <label for="title" class="block text-sm font-medium text-[#2c2c2c] mb-1">Judul Buku</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan judul buku" required>
                </div>

              
                <div>
                    <label for="stock" class="block text-sm font-medium text-[#2c2c2c] mb-1">Stok Buku</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan jumlah stok" required>
                </div>

                
                <div>
                    <label for="image" class="block text-sm font-medium text-[#2c2c2c] mb-1">Gambar Buku</label>
                    <input type="file" id="image" name="image"
                        class="w-full file:px-4 file:py-2 file:border-0 file:text-sm file:bg-gray-200 file:text-[#2c2c2c] file:rounded 
                    border border-[#e2e2e2] rounded focus:outline-none focus:ring-2 focus:ring-[#2d4fb1] bg-white text-[#2c2c2c]" />
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-[#2c2c2c] mb-1">Deskripsi Buku</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full border border-[#e2e2e2] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan deskripsi buku">{{ old('description') }}</textarea>
                </div>

                <div class="md:col-span-2 pt-4 flex gap-4">
                    <a href="{{ route('books.index') }}"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Cancel
                    </a>
                    <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection