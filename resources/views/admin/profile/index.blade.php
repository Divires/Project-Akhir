@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Profil')

@section('content')
<div>
    <div class="text-xl mb-4 flex gap-2 items-center font-medium">
        <span class="text-[#2c2c2c]">Profil</span>
    </div>

    <div class="overflow-x-auto border border-[#e2e2e2] rounded-lg p-6 bg-white text-sm shadow w-full">
        <div class="grid md:grid-cols-3 gap-6">

            <div class="flex flex-col items-center gap-3 col-span-1">
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('/default-profile.png') }}"
                     alt="Foto Profil"
                     class="w-24 h-24 object-cover rounded-full border border-gray-300">
            </div>

            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Nama</label>
                    <p class="w-full h-10 px-3 flex items-center border border-[#e2e2e2] rounded bg-[#f9f9f9]">
                        {{ $user->name }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Email</label>
                    <p class="w-full h-10 px-3 flex items-center border border-[#e2e2e2] rounded bg-[#f9f9f9]">
                        {{ $user->email }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#2c2c2c] mb-1">Jabatan</label>
                    <p class="w-full h-10 px-3 flex items-center border border-[#e2e2e2] rounded bg-[#f9f9f9]">
                        {{ $user->position ?? '-' }}
                    </p>
                </div>
            </div>

            <div class="md:col-span-3 pt-4 flex">
                <a href="{{ route('admin.profile.edit') }}"
                   class="bg-[#2d4fb1] text-white px-6 py-2 rounded hover:bg-[#24438a] transition">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection