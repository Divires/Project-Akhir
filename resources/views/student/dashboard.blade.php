@extends('layouts.student')

@section('title', 'Dashboard Siswa')

@section('content')
<h2>📚 Daftar Buku Tersedia</h2>

{{-- Form Search --}}
<form method="GET" action="{{ url()->current() }}" class="mb-3">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="Cari judul buku..."
        autocomplete="off"
    >
</form>

@if($books->count())
<div class="mb-4 position-relative">

    {{-- Tombol Scroll kiri/kanan --}}
    <button id="scrollLeftBtn" class="btn btn-light position-absolute top-50 translate-middle-y" style="left: 0; z-index: 10;">
        <i class="bi bi-chevron-left"></i>
    </button>
    <button id="scrollRightBtn" class="btn btn-light position-absolute top-50 translate-middle-y" style="right: 0; z-index: 10;">
        <i class="bi bi-chevron-right"></i>
    </button>

    <div class="overflow-auto" style="white-space: nowrap; padding: 0 40px;" id="bookScrollContainer">
        @foreach($books as $book)
            <div
                class="card me-3"
                style="display: inline-block; width: 150px; cursor: pointer;"
                data-bs-toggle="modal"
                data-bs-target="#bookModal{{ $book->id }}"
            >
                @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 220px; object-fit: cover;">
                @else
                    <div style="height: 220px; background: #ccc; display: flex; align-items: center; justify-content: center;">
                        <span class="text-muted">No Image</span>
                    </div>
                @endif
                <div class="card-body p-2">
                    <p class="card-text text-truncate mb-1" title="{{ $book->title }}"><strong>{{ $book->title }}</strong></p>
                    <div class="text-muted" style="font-size: 0.75rem;">
                        <i class="bi bi-book"></i> {{ $book->stock ?? 0 }}
                    </div>
                </div>
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $book->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $book->id }}">{{ $book->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body d-flex flex-wrap">
                            @if($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="Cover Buku" class="me-3 mb-3" style="width: 200px; height: 280px; object-fit: cover;">
                            @endif
                            <div style="flex: 1 1 auto; min-width: 250px;">
                                <p><strong>Kode:</strong> {{ $book->code }}</p>
                                <p><strong>Deskripsi:</strong><br> {!! nl2br(e($book->description)) ?: '-' !!}</p>
                                <p><strong>Stok Tersedia:</strong> {{ $book->stock }}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            {{-- Tambah tombol "Pinjam Buku" jika perlu --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@else
    <p>Tidak ada buku yang tersedia.</p>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('bookScrollContainer');
        const scrollLeftBtn = document.getElementById('scrollLeftBtn');
        const scrollRightBtn = document.getElementById('scrollRightBtn');

        scrollLeftBtn.addEventListener('click', () => {
            container.scrollBy({ left: -200, behavior: 'smooth' });
        });

        scrollRightBtn.addEventListener('click', () => {
            container.scrollBy({ left: 200, behavior: 'smooth' });
        });
    });
</script>
@endsection
