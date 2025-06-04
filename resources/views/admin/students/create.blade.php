@extends('layouts.admin')

@section('title', 'Tambah Siswa Baru')

@section('content')
<h1>Tambah Siswa Baru</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.students.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" id="nis" name="nis" value="{{ old('nis') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="class" class="form-label">Kelas</label>
        <input type="text" id="class" name="class" value="{{ old('class') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
