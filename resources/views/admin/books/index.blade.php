@extends('layouts.admin')

@section('title', 'Daftar Buku')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📚 Daftar Buku</h5>
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">+ Tambah Buku</a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('books.index') }}" class="mb-3">
            <div class="input-group">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul, kode, atau deskripsi..."
                    value="{{ request('search') }}"
                >
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Gambar</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td class="text-center" style="width: 80px;">
                                @if ($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" width="60">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $book->code }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ Str::limit($book->description, 60) }}</td>
                            <td class="text-center">{{ $book->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus buku ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada buku ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
