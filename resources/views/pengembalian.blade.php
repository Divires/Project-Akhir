@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Peminjaman > Pengembalian Buku')

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="/peminjaman" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Peminjaman</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Pengembalian Buku</span>
        </div>

        <!-- Form -->
        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <form class="grid grid-cols-1 gap-6">
                <!-- Nama Siswa -->
                <div>
                    <label for="nama_siswa" class="block text-sm font-medium text-[#2c2c2c] mb-1">Nama Siswa</label>
                    <input type="text" id="nama_siswa" name="nama_siswa"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan nama siswa">
                </div>

                <!-- Judul Buku -->
                <div>
                    <label for="judul_buku" class="block text-sm font-medium text-[#2c2c2c] mb-1">Judul Buku</label>
                    <input type="text" id="judul_buku" name="judul_buku"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan judul buku">
                </div>

                <!-- Tanggal Kembali -->
                <div>
                    <label for="tanggal_kembali" class="block text-sm font-medium text-[#2c2c2c] mb-1">Tanggal Kembali</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]">
                </div>

                <!-- Tombol -->
                <div class="pt-4 flex gap-4">
                    <a href="/peminjaman"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Cancel
                    </a>
                    <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                        Simpan Pengembalian
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
