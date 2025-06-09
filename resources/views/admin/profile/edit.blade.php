@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Profil > Edit Profil')

@section('content')
<div>
    <!-- Breadcrumb -->
    <div class="text-xl mb-4 flex gap-2 items-center font-medium">
        <a href="/profil" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Profil</a>
        <span class="text-[#7c7c7c]">></span>
        <span class="text-[#2d4fb1]">Edit Profil</span>
    </div>

    <!-- Notifikasi sukses -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Container -->
    <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-3 gap-6">
            @csrf
            @method('PUT')

            <!-- Foto Profil di kiri -->
            <div class="flex flex-col items-center gap-3 col-span-1">
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : '/default-profile.png' }}"
                     alt="Foto Profil"
                     class="w-24 h-24 object-cover rounded-full border border-gray-300">
                <input type="file" id="photo" name="photo"
                    class="file:px-4 file:py-2 file:border-0 file:bg-gray-200 file:text-[#2c2c2c] file:rounded border border-[#e2e2e2] rounded focus:outline-none focus:ring-2 focus:ring-[#2d4fb1] text-sm mt-2" />
            </div>

            <!-- Input Form di kanan -->
            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama (full width) -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-[#2c2c2c] mb-1">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#2c2c2c] mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan email">
                </div>

                <!-- Jabatan -->
                <div>
                    <label for="position" class="block text-sm font-medium text-[#2c2c2c] mb-1">Jabatan</label>
                    <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan jabatan">
                </div>

                <!-- Informasi Password -->
                <div class="md:col-span-2 mt-4 text-[#2c2c2c]">
                    <p class="font-medium">Ubah Password (opsional)</p>
                    <p class="text-sm text-[#7c7c7c]">Kosongkan jika tidak ingin mengubah password.</p>
                </div>

                <!-- Password -->
                <div class="md:col-span-2">
                    <label for="password" class="block text-sm font-medium text-[#2c2c2c] mb-1">Password Baru</label>
                    <input type="password" id="password" name="password"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan password baru">
                </div>

                <!-- Konfirmasi Password -->
                <div class="md:col-span-2">
                    <label for="password_confirmation" class="block text-sm font-medium text-[#2c2c2c] mb-1">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
                        placeholder="Masukkan ulang password">
                </div>
            </div>

            <!-- Tombol -->
            <div class="md:col-span-3 pt-4 flex gap-4">
                <a href="{{ route('admin.profile.index') }}" class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                    Batal
                </a>
                <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection