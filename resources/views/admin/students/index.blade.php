@extends('layouts.app')

@section('title', 'READIFY')
@section('subtitle', 'Overview aplikasi dan statistik terkini')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8 gap-4">
            <h1 class="text-xl font-medium text-[#2c2c2c]">Siswa</h1>
            <a href="{{ route('admin.students.create') }}"
                class="flex items-center gap-2 bg-[#2d4fb1] text-[#fafafa] px-4 py-2 rounded hover:bg-[#24438a] transition">
                <span class="text-xl">＋</span>
                <span>Tambah Siswa</span>
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="border border-[#e2e2e2] rounded-lg p-6 bg-white shadow">
            <div class="mb-6">
                <form action="{{ route('admin.students.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                        class="w-full text-sm sm:w-96 h-10 border border-[#e2e2e2] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]" />
                </form>
            </div>

            <div class="overflow-x-auto sm:overflow-x-visible">
                <div class="overflow-x-auto">
                    <table class="min-w-full rounded-lg border-collapse">
                        <thead>
                            <tr class="bg-[#f6f6f6] text-left text-sm font-semibold h-12">
                                <th class="w-1/5 px-4">NIS</th>
                                <th class="w-1/4 px-4">Nama</th>
                                <th class="w-1/5 px-4">Kelas</th>
                                <th class="w-1/3 px-4">Email</th>
                                <th class="w-1/6 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr class="h-20">
                                    <td class="px-4 font-medium text-[#9b9a9a] whitespace-nowrap">{{ $student->nis }}</td>
                                    <td class="px-4 font-medium text-[#9b9a9a]">{{ $student->name }}</td>
                                    <td class="px-4 font-medium text-[#9b9a9a]">{{ $student->class }}</td>
                                    <td class="px-4 font-medium text-[#9b9a9a]">{{ $student->email }}</td>
                                    <td class="px-4 flex justify-center items-center gap-5 text-lg py-8">
                                        <a href="{{ route('admin.students.show', $student->id) }}" aria-label="Lihat"
                                            class="text-[#a1a0a0] hover:text-[#858484] transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                                <path
                                                    d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('admin.students.edit', $student->id) }}" aria-label="Edit"
                                            class="text-[#2d4fb1] hover:text-[#1f3a7e] transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path
                                                    d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0z" />
                                                <path d="M15 6l3 3" />
                                                <path d="M13 21h8" />
                                            </svg>
                                        </a>

                                        <x-delete :action="route('admin.students.destroy', $student->id)" />
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-[#999]">Tidak ada data siswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection