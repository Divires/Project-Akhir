@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Admin > Edit Profil')

@section('content')
<div>
    <div class="text-xl mb-4 flex gap-2 items-center font-medium">
        <a href="{{ route('admin.profile.edit') }}" class="text-[#2c2c2c] hover:text-[#2d4fb1]">Profil</a>
        <span class="text-[#7c7c7c]">></span>
        <span class="text-[#2d4fb1]">Edit Profil Admin</span>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="md:col-span-2">
            <label for="name" class="block text-sm font-medium text-[#2c2c2c] mb-1">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" required>
            @error('name')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-[#2c2c2c] mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" required>
            @error('email')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <!-- Position -->
        <div>
            <label for="position" class="block text-sm font-medium text-[#2c2c2c] mb-1">Jabatan</label>
            <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}"
                class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]">
            @error('position')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <!-- Photo -->
        <div>
            <label for="photo" class="block text-sm font-medium text-[#2c2c2c] mb-1">Foto Profil</label>
            <input type="file" id="photo" name="photo"
                class="w-full border border-[#e2e2e2] rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]">
            @error('photo')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="mt-2 w-24 h-24 object-cover rounded-full border border-gray-300">
            @endif
        </div>

        <!-- Password -->
        <div class="md:col-span-2">
            <label for="password" class="block text-sm font-medium text-[#2c2c2c] mb-1">Password Baru (opsional)</label>
            <input type="password" id="password" name="password"
                class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" placeholder="Kosongkan jika tidak ingin mengubah">
            @error('password')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <!-- Password Confirmation -->
        <div class="md:col-span-2">
            <label for="password_confirmation" class="block text-sm font-medium text-[#2c2c2c] mb-1">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]">
        </div>

        <!-- Buttons -->
        <div class="md:col-span-2 pt-4 flex gap-4">
            <a href="{{ url()->previous() }}"
                class="px-6 py-2 rounded border border-[#e2e2e2] text-[#2c2c2c] hover:bg-[#f1f1f1] transition">
                Batal
            </a>
            <button type="submit" class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection