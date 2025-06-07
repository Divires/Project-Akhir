@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
<h1>Daftar Siswa</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('students.index') }}" method="GET" class="mb-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, NIS, kelas..." class="form-control" />
</form>

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Tambah Siswa Baru</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <!-- <th>Created At</th> -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
        <tr>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->class }}</td>
            <!-- <td>{{ $student->created_at->format('d-m-Y') }}</td> -->
            <td>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus siswa ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Tidak ada data siswa.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
