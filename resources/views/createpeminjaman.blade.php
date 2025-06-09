@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Peminjaman > Pinjam Baru')

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="/peminjaman" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Peminjaman</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Pinjam Baru</span>
        </div>

        <!-- Form -->
        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <form class="grid grid-cols-1 gap-6">
                <!-- NIS -->
                <div>
                    <label for="nis" class="block text-sm font-medium text-[#2c2c2c] mb-1">NIS</label>
                    <input type="text" id="nis" name="nis"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan NIS siswa">
                </div>

                <!-- Kode Buku -->
                <div>
                    <label for="kode_buku" class="block text-sm font-medium text-[#2c2c2c] mb-1">Kode Buku</label>
                    <input type="text" id="kode_buku" name="kode_buku"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan kode buku">
                </div>

                <!-- Tanggal Pinjam -->
                <div>
                    <label for="tanggal_pinjam" class="block text-sm font-medium text-[#2c2c2c] mb-1">Tanggal Pinjam</label>
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]">
                </div>

                <!-- Tombol -->
                <div class="pt-4 flex gap-4">
                    <a href="/peminjaman"
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
