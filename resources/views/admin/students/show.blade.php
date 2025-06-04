@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
<h1>Detail Siswa</h1>

<table class="table table-bordered">
    <tr>
        <th>NIS</th>
        <td>{{ $student->nis }}</td>
    </tr>
    <tr>
        <th>Nama Lengkap</th>
        <td>{{ $student->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $student->email }}</td>
    </tr>
    <tr>
        <th>Kelas</th>
        <td>{{ $student->class }}</td>
    </tr>
    <tr>
        <th>Dibuat Pada</th>
        <td>{{ $student->created_at->format('d-m-Y H:i') }}</td>
    </tr>
    <tr>
        <th>Diupdate Pada</th>
        <td>{{ $student->updated_at->format('d-m-Y H:i') }}</td>
    </tr>
</table>

<a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Kembali</a>
<a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
@endsection
