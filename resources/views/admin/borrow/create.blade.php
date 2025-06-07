@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')
<div class="container">
    <h2>Form Peminjaman Buku</h2>
    <form action="{{ route('borrow.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="nis" class="form-label">NIS Siswa</label>
    <select id="nis" name="nis" class="form-control select2-nis"></select>
</div>

        <div class="mb-3">
    <label for="book_id" class="form-label">Kode Buku</label>
    <select id="book_id" name="book_id" class="form-control select2-book"></select>
</div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" id="borrow_date" name="borrow_date" class="form-control" value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Kembali</label>
            <input type="date" id="return_date" name="return_date" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2-nis').select2({
            placeholder: 'Ketik NIS atau nama...',
            ajax: {
                url: '{{ route("search.students") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.nis,
                            text: `${item.nis} - ${item.name}`
                        }))
                    };
                }
            }
        });

        $('.select2-book').select2({
            placeholder: 'Ketik kode buku atau judul...',
            ajax: {
                url: '{{ route("search.books") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.code,
                            text: `${item.code} - ${item.title}`
                        }))
                    };
                }
            }
        });

        // Auto isi tanggal kembali
        $('#borrow_date').on('change', function () {
            let pinjam = new Date(this.value);
            pinjam.setDate(pinjam.getDate() + 7);
            $('#return_date').val(pinjam.toISOString().split('T')[0]);
        });

        $('#borrow_date').trigger('change');
    });
</script>
@endsection