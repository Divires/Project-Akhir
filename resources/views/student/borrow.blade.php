@extends('layouts.student')

@section('title', 'Riwayat Peminjaman')

@section('content')
    @if($borrow->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowings as $index => $borrow)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $borrow->book->title }}</td>
                            <td>{{ $borrow->borrowed_at->format('d-m-Y') }}</td>
                            <td>{{ $borrow->returned_at ? $borrow->returned_at->format('d-m-Y') : '-' }}</td>
                            <td>
                                @if($borrow->returned_at)
                                    <span class="badge bg-success">Dikembalikan</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum Kembali</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">Belum ada data peminjaman.</p>
    @endif
@endsection
