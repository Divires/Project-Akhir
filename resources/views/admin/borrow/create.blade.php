@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')
<div class="container">
    <h3>Form Peminjaman Buku</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('borrow.store') }}">
        @csrf

        <div class="mb-3">
            <label>NIS Siswa</label>
            <input type="text" name="nis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kode Buku</label>
            <input type="text" name="book_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="borrow_date" class="form-control" value="{{ now()->toDateString() }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Pinjam Buku</button>
    </form>
</div>
@endsection