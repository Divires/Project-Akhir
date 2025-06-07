@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')
<div class="container">
     <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Peminjaman Aktif</h2>
        <a href="{{ route('borrow.create') }}" class="btn btn-primary">+ Tambah Peminjaman</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrow as $loan)
                <tr>
                    <td>{{ $loan->student->nis }}</td>
                    <td>{{ $loan->student->name }}</td>
                    <td>{{ $loan->book->judul }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>{{ $loan->return_date }}</td>
                    <td>
                        <form action="{{ route('borrow.return', $loan->id) }}" method="POST" onsubmit="return confirm('Yakin dikembalikan?')">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm">Kembalikan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection