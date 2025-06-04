<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Student Panel - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container">
            <h1>Dashboard Siswa</h1>
            <nav>
                <a href="{{ route('student.dashboard') }}" class="text-white">🏠 Beranda</a> |
                <a href="{{ route('student.borrowings') }}" class="text-white">📘 Peminjaman</a> |
                <a href="{{ route('logout') }}" class="text-white">🔓 Logout</a>
            </nav>
        </div>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="text-center mt-4 text-muted">
        &copy; {{ date('Y') }} Sistem Peminjaman Buku - Siswa
    </footer>
</body>
</html>
