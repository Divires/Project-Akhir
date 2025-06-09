@extends('layouts.appstudent')

@section('title', 'Dashboard Siswa')

@section('content')
<!-- <h2 class="text-xl font-bold mb-4 text-gray-800">Daftar Buku Tersedia</h2> -->

{{-- Form Pencarian --}}
<form method="GET" action="{{ url()->current() }}" class="mb-6">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari judul buku..."
        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300"
    >
</form>

@if($books->count())
<div class="relative mb-4">
    {{-- Scrollable Container --}}
    <div id="bookGridContainer" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 px-4 pb-4">

        @foreach($books as $book)
        <div class="min-w-[9rem] bg-white rounded-xl shadow hover:shadow-md cursor-pointer" 
            onclick="openModal({{ $book->id }})"
        >
            @if($book->image)
                <div class="w-full h-48 bg-white flex items-center justify-center rounded-t-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="max-h-full max-w-full object-contain">
                </div>
            @else
                <div class="w-full h-44 flex items-center justify-center bg-gray-100 text-gray-500 text-sm">No Image</div>
            @endif
            <div class="p-2">
                <p class="text-sm font-semibold truncate">{{ $book->title }}</p>
                <!-- <p class="text-xs text-gray-500"> {{ $book->stock }}</p> -->
            </div>
        </div>

        <div id="modal-{{ $book->id }}" class="fixed inset-0 z-50 hidden bg-black/30 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-3xl p-6 relative">
                <button class="absolute top-2 right-2 text-gray-600 hover:text-black" onclick="closeModal({{ $book->id }})">&times;</button>
                <div class="flex flex-col md:flex-row gap-4">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Cover Buku" class="w-40 h-56 object-cover rounded">
                    @endif
                    <div class="w-full overflow-x-auto">
                        <h3 class="text-lg font-bold mb-4">{{ $book->title }}</h3>
                        <table class="w-full text-sm text-left text-gray-600">
                            <tbody>
                                <tr>
                                    <th class="pr-4 py-1 text-gray-700 w-1/3">Kode</th>
                                    <td class="py-1">{{ $book->code }}</td>
                                </tr>
                                <tr>
                                    <th class="pr-4 py-1 text-gray-700">Stok</th>
                                    <td class="py-1">{{ $book->stock }}</td>
                                </tr>
                                <tr>
                                    <th class="pr-4 py-1 align-top text-gray-700">Deskripsi</th>
                                    <td class="py-1">{!! nl2br(e($book->description)) ?: '-' !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
    <p class="text-gray-500">Tidak ada buku yang tersedia.</p>
@endif

{{-- JS Scroll & Modal --}}
<script>
    const scrollContainer = document.getElementById('bookScrollContainer');
    document.getElementById('scrollLeftBtn').onclick = () => scrollContainer.scrollBy({ left: -200, behavior: 'smooth' });
    document.getElementById('scrollRightBtn').onclick = () => scrollContainer.scrollBy({ left: 200, behavior: 'smooth' });

    function openModal(id) {
        document.getElementById(`modal-${id}`).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).classList.add('hidden');
    }
</script>
@endsection