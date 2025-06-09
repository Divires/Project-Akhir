<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Include Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .sidebar .sidebar-header {
            padding: 15px 20px;
            font-size: 1.25rem;
            font-weight: bold;
            border-bottom: 1px solid #495057;
        }

        .sidebar-footer {
            border-top: 1px solid #495057;
            padding: 10px 20px;
        }

        .sidebar-footer form {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-header">
            📘 Admin Panel
        </div>

        <nav class="flex-grow-1">
            <a href="{{ route('books.index') }}">📚 Manajemen Buku</a>
            <a href="{{ route('students.index') }}">👨‍🎓 Manajemen Siswa</a>
            <a href="{{ route('borrow.index')}}">Peminjaman</a>
            {{-- Tambahkan menu lainnya di sini --}}
        </nav>

        <div class="sidebar-footer">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm w-100">🔒 Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="h4 mb-4">@yield('title')</h1>
        @yield('content')
    </div>

    {{-- Bootstrap JS (opsional, untuk dropdown/modal dsb) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
