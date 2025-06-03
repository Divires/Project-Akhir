<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - READIFY</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/css/buku.css')}}" />
</head>
<body>
  <div class="dashboard-wrapper">
    
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2 class="logo">READIFY</h2>
      <nav class="menu">
        <a href="#" class="menu-item active"><img src="icons/home.svg" alt=""> Dashboard</a>
        <a href="#" class="menu-item"><img src="icons/book.svg" alt=""> Buku</a>
        <a href="#" class="menu-item"><img src="icons/student.svg" alt=""> Siswa</a>
        <a href="#" class="menu-item"><img src="icons/borrow.svg" alt=""> Peminjaman</a>
      </nav>
      <div class="logout">
        <a href="#" class="menu-item"><img src="icons/logout.svg" alt=""> Keluar</a>
      </div>
    </aside>

    <!-- Main content -->
    <div class="main-content">
      <!-- App bar -->
      <header class="app-bar">
        <div class="left-text">Selamat datang admin</div>
        <div class="right-icons">
          <img src="icons/notification.svg" alt="">
          <div class="divider"></div>
          <img src="icons/profile.svg" alt="">
        </div>
      </header>

      <!-- Page Content -->
      <section class="content">
        <div class="top-bar">
          <h3>Buku</h3>
          <button class="btn-tambah"><img src="icons/plus.svg" alt=""> Tambah Baru</button>
        </div>

        <div class="tabel-container">
          <input type="text" placeholder="Search..." class="search-bar">
          
          <table>
            <thead>
              <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>BK001</td>
                <td>Pengantar HTML</td>
                <td>12</td>
                <td>
                  <img src="icons/eye.svg" alt="">
                  <img src="icons/edit.svg" alt="">
                  <img src="icons/delete.svg" alt="">
                </td>
              </tr>
              <tr>
                <td>BK002</td>
                <td>CSS Dasar</td>
                <td>7</td>
                <td>
                  <img src="icons/eye.svg" alt="">
                  <img src="icons/edit.svg" alt="">
                  <img src="icons/delete.svg" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>

  </div>
</body>
</html>