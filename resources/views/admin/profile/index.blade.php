@extends('layouts.app')

@section('title', 'Profil Admin')
@section('subtitle', 'Admin > Profil')

@section('content')
<div class="p-4 bg-white rounded shadow w-full max-w-md mx-auto">
    <h1 class="text-xl font-semibold mb-4">Profil Anda</h1>
    <div class="mb-2"><strong>Nama:</strong> {{ $user->name }}</div>
    <div class="mb-2"><strong>Email:</strong> {{ $user->email }}</div>
    <div class="mb-2"><strong>Jabatan:</strong> {{ $user->position ?? '-' }}</div>
    @if($user->photo)
    <div class="mb-2">
        <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border">
    </div>
    @endif

    <a href="{{ route('admin.profile.edit') }}"
       class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
       Edit Profil
    </a>
</div>
@endsection