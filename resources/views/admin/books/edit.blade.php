@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="code" class="form-label">Kode Buku</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $book->code) }}" readonly>
            @error('code') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $book->stock) }}">
            @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
