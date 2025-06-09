@extends('layouts.admin')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Buku</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <strong>Kode:</strong><br>
                {{ $book->code }}
            </div>

            <div class="mb-3">
                <strong>Judul:</strong><br>
                {{ $book->title }}
            </div>

            <div class="mb-3">
                <strong>Stok:</strong><br>
                {{ $book->stock }}
            </div>

            @if ($book->description)
                <div class="mb-3">
                    <strong>Deskripsi:</strong><br>
                    {{ $book->description }}
                </div>
            @endif

            @if ($book->image)
                <div class="mb-3">
                    <strong>Gambar:</strong><br>
                    <img src="{{ Storage::url($book->image) }}" alt="Gambar Buku" width="150" class="img-thumbnail">
                </div>
            @endif

            <a href="{{ route('books.index') }}" class="btn btn-secondary">← Kembali ke Daftar</a>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
