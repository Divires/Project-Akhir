@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Siswa > Detail Siswa')

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="text-xl mb-4 flex gap-2 items-center font-medium">
            <a href="/siswa" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Siswa</a>
            <span class="text-[#7c7c7c]">></span>
            <span class="text-[#2d4fb1]">Detail Siswa</span>
        </div>

        <!-- Detail Siswa -->
        <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Siswa (Full Width) -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Nama Siswa</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">Budi Santoso</p>
                </div>

                <!-- NIS -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">NIS</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">123456</p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Email</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">budi@example.com</p>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Password</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">********</p>
                </div>

                <!-- Kelas -->
                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Kelas</label>
                    <p class="border border-[#e2e2e2] rounded px-3 py-2 bg-gray-100">XII IPA 2</p>
                </div>

                <!-- Tombol -->
                <div class="md:col-span-2 pt-4">
                    <a href="/siswa"
                        class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
