@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Siswa > Edit Siswa')

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="/siswa" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Siswa</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Edit Siswa</span>
        </div>

        <!-- Form -->
        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Siswa (Full Width) -->
                <div class="md:col-span-2">
                    <label for="nama" class="block text-sm font-medium text-[#2c2c2c] mb-1">Nama Siswa</label>
                    <input type="text" id="nama" name="nama" value="Budi Santoso"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan nama siswa">
                </div>

                <!-- NIS -->
                <div>
                    <label for="nis" class="block text-sm font-medium text-[#2c2c2c] mb-1">NIS</label>
                    <input type="text" id="nis" name="nis" value="123456"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan NIS siswa">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#2c2c2c] mb-1">Email</label>
                    <input type="email" id="email" name="email" value="budi@example.com"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan email siswa">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#2c2c2c] mb-1">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan password baru (kosongkan jika tidak diubah)">
                </div>

                <!-- Kelas -->
                <div>
                    <label for="kelas" class="block text-sm font-medium text-[#2c2c2c] mb-1">Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="XII IPA 2"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan kelas siswa">
                </div>

                <!-- Tombol -->
                <div class="md:col-span-2 pt-4 flex gap-4">
                    <a href="/siswa"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                        Update Siswa
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
