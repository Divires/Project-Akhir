@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>

    <div class="mb-3">
        <strong>Kode:</strong> {{ $book->code }}
    </div>

    <div class="mb-3">
        <strong>Judul:</strong> {{ $book->title }}
    </div>

    <div class="mb-3">
        <strong>Stok:</strong> {{ $book->stock }}
    </div>

    <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
