@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Buku > Edit Buku')

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="{{ route('books.index') }}" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Buku</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Edit Buku</span>
        </div>

        <!-- Form -->
        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                @method('PUT')

                <!-- Kode Buku -->
                <div>
                    <label for="code" class="block text-sm font-medium text-[#2c2c2c] mb-1">Kode Buku</label>
                    <input type="text" id="code" name="code" value="{{ old('code', $book->code) }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan kode buku" required>
                    @error('code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Judul Buku -->
                <div>
                    <label for="title" class="block text-sm font-medium text-[#2c2c2c] mb-1">Judul Buku</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan judul buku" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok Buku -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-[#2c2c2c] mb-1">Stok Buku</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $book->stock) }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan jumlah stok" required>
                    @error('stock')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar Buku -->
                <div>
                    <label for="image" class="block text-sm font-medium text-[#2c2c2c] mb-1">Gambar Buku</label>
                    <input type="file" id="image" name="image"
                        class="w-full file:px-4 file:py-2 file:border-0 file:text-sm file:bg-gray-200 file:text-[#2c2c2c] file:rounded
                    border border-[#e2e2e2] rounded focus:outline-none focus:ring-2 focus:ring-[#2d4fb1] bg-white text-[#2c2c2c]" />
                    @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Gambar Buku" class="mt-2 max-h-40">
                    @endif
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi Buku (full width) -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-[#2c2c2c] mb-1">Deskripsi Buku</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full border border-[#e2e2e2] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan deskripsi buku">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="md:col-span-2 pt-4 flex gap-4">
                    <a href="{{ route('books.index') }}"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                        Update Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection