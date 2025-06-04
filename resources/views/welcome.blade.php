<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'READIFY') }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/buku.css') }}">
</head>

<body>
    <div class="dashboard-wrapper">

        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="logo">{{ config('app.name', 'READIFY') }}</h2>
            <nav class="menu">
                <a href="#" class="menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1"
                            d="M8.557 2.75H4.682A1.93 1.93 0 0 0 2.75 4.682v3.875a1.94 1.94 0 0 0 1.932 1.942h3.875a1.94 1.94 0 0 0 1.942-1.942V4.682A1.94 1.94 0 0 0 8.557 2.75m10.761 0h-3.875a1.94 1.94 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942V4.682a1.93 1.93 0 0 0-1.932-1.932m0 10.75h-3.875a1.94 1.94 0 0 0-1.942 1.933v3.875a1.94 1.94 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942v-3.875a1.93 1.93 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.93 1.93 0 0 0 1.932 1.932h3.875a1.94 1.94 0 0 0 1.942-1.932v-3.875a1.94 1.94 0 0 0-1.942-1.942" />
                    </svg> 
                    Dashboard
                </a>
                <a href="#" class="menu-item active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M7.616 21q-1.091 0-1.853-.763T5 18.386V6q0-1.239.868-2.12T8 3h11v13.77q-.688 0-1.152.475t-.463 1.14q0 .688.463 1.151T19 20v1zm0-1h9.363q-.285-.33-.44-.732q-.155-.4-.155-.884q0-.457.152-.87t.443-.745H7.616q-.689 0-1.152.476T6 18.385q0 .688.464 1.151T7.616 20M6 16.363q.33-.29.732-.442q.4-.152.883-.152H18V4H8q-.842 0-1.421.591Q6 5.183 6 6zm3.052-3.594h.821l.587-1.583h3.055l.587 1.583h.802l-2.458-6.538h-.923zm1.68-2.338l1.257-3.362h.017l1.236 3.362zM6 16.363V4.385z" />
                    </svg> 
                    Buku
                </a>
                <a href="#" class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M17.438 21.937H6.562a2.5 2.5 0 0 1-2.5-2.5v-.827c0-3.969 3.561-7.2 7.938-7.2s7.938 3.229 7.938 7.2v.827a2.5 2.5 0 0 1-2.5 2.5M12 12.412c-3.826 0-6.938 2.78-6.938 6.2v.827a1.5 1.5 0 0 0 1.5 1.5h10.876a1.5 1.5 0 0 0 1.5-1.5v-.829c0-3.418-3.112-6.198-6.938-6.198m0-2.501a3.924 3.924 0 1 1 3.923-3.924A3.927 3.927 0 0 1 12 9.911m0-6.847a2.924 2.924 0 1 0 2.923 2.923A2.926 2.926 0 0 0 12 3.064" />
                    </svg> 
                    Siswa
                </a>
                <a href="#" class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18.436 20.937H5.562a2.5 2.5 0 0 1-2.5-2.5V5.563a2.5 2.5 0 0 1 2.5-2.5h12.874a2.5 2.5 0 0 1 2.5 2.5v12.874a2.5 2.5 0 0 1-2.5 2.5M5.562 4.063a1.5 1.5 0 0 0-1.5 1.5v12.874a1.5 1.5 0 0 0 1.5 1.5h12.874a1.5 1.5 0 0 0 1.5-1.5V5.563a1.5 1.5 0 0 0-1.5-1.5Z" />
                        <path fill="currentColor"
                            d="M6.544 8.283a.52.52 0 0 1-.353-.147a.5.5 0 0 1 0-.707a.5.5 0 0 1 .353-.146H7.55a.52.52 0 0 1 .353.146a.5.5 0 0 1 .147.354a.5.5 0 0 1-.5.5Zm0 4.217a.52.52 0 0 1-.353-.146a.5.5 0 0 1 0-.708a.52.52 0 0 1 .353-.146H7.55a.52.52 0 0 1 .353.146a.5.5 0 0 1 0 .708a.52.52 0 0 1-.353.146Zm0 4.22a.52.52 0 0 1-.353-.147a.5.5 0 0 1 0-.707a.52.52 0 0 1 .353-.146H7.55a.52.52 0 0 1 .353.146a.5.5 0 0 1 .147.354a.5.5 0 0 1-.5.5Zm4.01-8.439a.5.5 0 0 1 0-1h6.9a.5.5 0 0 1 0 1Zm0 4.219a.5.5 0 0 1 0-1h6.9a.5.5 0 0 1 0 1Zm0 4.218a.5.5 0 0 1 0-1h6.9a.5.5 0 0 1 0 1Z" />
                    </svg>
                    Peminjaman
                </a>
            </nav>
            <div class="logout">
                <a href="#" class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h5.903q.214 0 .357.143t.143.357t-.143.357t-.357.143H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h5.904q.214 0 .357.143t.143.357t-.143.357t-.357.143zm12.444-7.5H9.692q-.213 0-.356-.143T9.192 12t.143-.357t.357-.143h8.368l-1.971-1.971q-.141-.14-.15-.338q-.01-.199.15-.364q.159-.165.353-.168q.195-.003.36.162l2.614 2.613q.242.243.242.566t-.243.566l-2.613 2.613q-.146.146-.347.153t-.366-.159q-.16-.165-.157-.357t.162-.35z" />
                    </svg> 
                    Keluar
                </a>
            </div>
        </aside>

        <!-- Main content -->
        <div class="main-content">
            <!-- App bar -->
            <header class="app-bar">
                <div class="left-text">Hai, Riana</div>
                <div class="right-icons">
                    <img src="{{ asset('assets/icons/notification.svg') }}" alt="">
                    <div class="divider"></div>
                    <img src="{{ asset('assets/img/profile.svg') }}" alt="">
                </div>
            </header>

            <!-- Page Content -->
            <section class="content">
                <div class="top-bar">
                    <h3>Buku</h3>
                    <button class="btn-tambah"><img src="{{ asset('assets/icons/plus.svg') }}" alt=""> Tambah
                        Baru</button>
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
                                    <img src="{{ asset('assets/icons/eye.svg') }}" alt="">
                                    <img src="{{ asset('assets/icons/edit.svg') }}" alt="">
                                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>BK002</td>
                                <td>CSS Dasar</td>
                                <td>7</td>
                                <td>
                                    <img src="{{ asset('assets/icons/eye.svg') }}" alt="">
                                    <img src="{{ asset('assets/icons/edit.svg') }}" alt="">
                                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="">
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
