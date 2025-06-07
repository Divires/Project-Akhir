@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')
<div class="container">
    <h3>Form Pengembalian Buku</h3>

    <form method="POST" action="{{ route('borrow.returnBook', $borrow->id) }}">
        @csrf

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" value="{{ $borrow->student->name }}" readonly>
        </div>

        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" class="form-control" value="{{ $borrow->book->title }}" readonly>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="actual_return_date" class="form-control" value="{{ now()->toDateString() }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pengembalian</button>
    </form>
</div>
@endsection