@extends('layouts.student')

@section('title', 'Dashboard Siswa')

@section('content')
    <h2>📚 Daftar Buku Tersedia</h2>

    @if($books->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->code }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                            <button 
                                class="btn btn-sm btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#bookModal{{ $book->id }}">
                                🔍 Detail
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $book->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $book->id }}">Detail Buku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Kode:</strong> {{ $book->code }}</p>
                                            <p><strong>Judul:</strong> {{ $book->title }}</p>
                                            <p><strong>Stok Tersedia:</strong> {{ $book->stock }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            {{-- Tambah tombol "Pinjam Buku" di sini jika perlu --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada buku yang tersedia.</p>
    @endif
@endsection
