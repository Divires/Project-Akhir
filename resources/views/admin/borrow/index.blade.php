@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')
<div class="container">
    <h3>Daftar Peminjaman</h3>

    <div class="mb-3">
        <a href="{{ route('borrow.create') }}" class="btn btn-success">Pinjam Baru</a>
        <a href="{{ route('borrow.index', ['status' => 'Dipinjam']) }}" class="btn btn-warning">Dipinjam</a>
        <a href="{{ route('borrow.index', ['status' => 'Dikembalikan']) }}" class="btn btn-info">Dikembalikan</a>
    </div>

    <table class="table">
    <thead>
        <tr>
            <th>Siswa</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Tanggal Dikembalikan</th>
            <th>Denda</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows as $borrow)
            <tr>
                <td>({{ $borrow->student->nis }}) {{ $borrow->student->name }}</td>
                <td>({{ $borrow->book->code }}) {{ $borrow->book->title }}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->expected_return_date }}</td>
                <td>
                    {{ $borrow->actual_return_date ?? '-' }}
                </td>
                <td>
                    Rp {{ number_format($borrow->denda ?? 0, 0, ',', '.') }}
                </td>
                <td>{{ $borrow->status }}</td>
                <td>
                    @if ($borrow->status === 'Dipinjam')
                        <a href="{{ route('borrow.returnForm', $borrow->id) }}" class="btn btn-sm btn-warning">Kembalikan</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection