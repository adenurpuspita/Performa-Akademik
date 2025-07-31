<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Halaman Guru')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #ededf7;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #e3e3f5;
            position: fixed;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
        }

        .sidebar img {
            width: 70px;
            margin: 0 auto 10px;
        }

        .sidebar h3 {
            font-size: 14px;
            text-align: center;
            margin: 0 10px 30px;
        }

        .sidebar a {
            width: calc(100% - 20px);
            margin-right: 10px;
            padding: 12px 30px;
            display: block;
            text-decoration: none;
            color: #333;
            border-left: 5px solid transparent;
            transition: background 0.3s, color 0.3s, border-radius 0.3s;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #8e8eef;
            color: white;
            font-weight: bold;
            border-left: 5px solid #6c6cf0;
        }

        /* Tombol Logout di bagian bawah */
        .logout-form {
            margin-top: auto;
            width: 100%;
            display: flex;
        }

        .logout-btn {
            width: 100%;
            text-align: left;
            padding: 12px 30px;
            background: none;
            border: none;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            border-left: 5px solid transparent;
            border-radius: 0 20px 20px 0;
            transition: background 0.3s, color 0.3s;
        }

        .logout-btn:hover {
            background-color: #8e8eef;
            color: white;
            font-weight: bold;
            border-left: 5px solid #6c6cf0;
        }

        .content {
            margin-left: 250px;
            padding: 20px 40px 80px;
            min-height: 100vh;
            background-color: #ededf7;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 250px;
            width: calc(100% - 250px);
            background-color: #8e8eef;
            color: white;
            text-align: center;
            padding: 12px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <img src="{{ asset('storage/img/tut_wuri_handayani.png') }}" alt="Logo">

        <h3>Pengelompokan Akademik<br>SMA Negeri 1 Cibeber</h3>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        @if(auth()->user()->level == 'Admin')
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                🏠 Dashboard
            </a>
            <a href="{{ route('datapengguna.index') }}" class="sidebar-link {{ request()->routeIs('datapengguna') ? 'active' : '' }}">
                👤 Kelola Akun Pengguna
            </a>
            <a href="{{ route('rombonganbelajar.index') }}" class="sidebar-link {{ request()->routeIs('rombonganbelajar') ? 'active' : '' }}">
                📚 Rombongan Belajar
            </a>
            <a href="{{ route('datasiswa.index') }}" class="sidebar-link {{ request()->routeIs('datasiswa') ? 'active' : '' }}">
                👥 Kelola Data Siswa
            </a>
            <a href="{{ route('riwayatadmin.index') }}" class="sidebar-link {{ request()->routeIs('riwayatadmin') ? 'active' : '' }}">
                📋 Riwayat Klasterisasi
            </a>
        @endif

        @if(auth()->user()->level == 'Guru')
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                🏠 Dashboard
            </a>
            <a href="{{ route('siswa.index') }}" class="sidebar-link {{ request()->routeIs('siswa') ? 'active' : '' }}">
                👥 Data Siswa
            </a>
            <a href="{{ route('nilaisiswa.index') }}" class="sidebar-link {{ request()->routeIs('nilaisiswa') ? 'active' : '' }}">
                📝 Input Nilai Siswa
            </a>
            <a href="{{ route('prosesklaster.index') }}" class="sidebar-link {{ request()->routeIs('prosesklaster') ? 'active' : '' }}">
                📊 Proses Pengelompokan
            </a>
            <a href="{{ route('hasilhitungan.index') }}" class="sidebar-link {{ request()->routeIs('hasilhitungan') ? 'active' : '' }}">
                📈 Hasil dan Deskripsi
            </a>
            <a href="{{ route('riwayatguru.index') }}" class="sidebar-link {{ request()->routeIs('riwayatguru') ? 'active' : '' }}">
                📋 Riwayat Proses Pengelompokan
            </a>
        @endif

        {{-- Tombol Logout --}}
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                ⬅ Keluar
            </button>
        </form>
    </div>

    {{-- Navbar atas --}}
    <div style="margin-left: 250px; background-color: #8e8eef; padding: 15px 40px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 18px; font-weight: bold; color: #ffff;">
            @yield('title', 'Sistem Perfoma Akademik')
        </div>
        <div style="font-size: 14px; color: #ffff;">
            👋 Halo {{ auth()->user()->name ?? '' }}
        </div>
    </div>

    {{-- Konten --}}
    <div class="content">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer>
        Copyright 2025
    </footer>

</body>
</html>
