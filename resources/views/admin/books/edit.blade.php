@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Buku</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Kode Buku (readonly) --}}
        <div class="mb-3">
            <label for="code" class="form-label">Kode Buku</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $book->code) }}" readonly>
            @error('code') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Judul Buku --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}">
            @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Stok --}}
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $book->stock) }}">
            @error('stock') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $book->description) }}</textarea>
            @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Gambar Buku --}}
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Buku</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image') <div class="text-danger small">{{ $message }}</div> @enderror

            @if ($book->image)
                <div class="mt-2">
                    <img src="{{ Storage::url($book->image) }}" alt="Gambar Buku" width="120">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
