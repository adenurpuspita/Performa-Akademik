@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div style="background-color: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.06);">
        <h1 style="color: #333; margin-bottom: 10px;">Selamat Datang 👋</h1>

        {{-- Konten khusus untuk Admin --}}
        @if(auth()->user()->level == 'Admin')
            <p style="color: #555; font-size: 16px; margin-bottom: 25px;">
                Ini adalah halaman utama <strong>Admin</strong> pada Sistem Pengelompokan Siswa Berdasarkan Performa Akademik.
            </p>

            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                {{-- Card Akun Pengguna --}}
                <div style="background-color: #8e8eef; color: white; flex: 1; min-width: 220px; border-radius: 12px; padding: 25px;">
                    <h3 style="margin: 0 0 10px;">👤 Akun Pengguna</h3>
                    <p style="font-size: 24px; font-weight: bold;">
                        {{ $totalPengguna ?? 120 }}
                    </p>
                </div>

                {{-- Card Data Siswa --}}
                <div style="background-color: #6c6cf0; color: white; flex: 1; min-width: 220px; border-radius: 12px; padding: 25px;">
                    <h3 style="margin: 0 0 10px;">👥 Data Siswa</h3>
                    <p style="font-size: 24px; font-weight: bold;">
                        {{ $totalSiswa ?? 432 }}
                    </p>
                </div>

                {{-- Card Riwayat Klasterisasi --}}
                <div style="background-color: #a0a0f2; color: white; flex: 1; min-width: 220px; border-radius: 12px; padding: 25px;">
                    <h3 style="margin: 0 0 10px;">📊 Riwayat Klasterisasi</h3>
                    <p style="font-size: 24px; font-weight: bold;">
                        {{ $totalRiwayat ?? 58 }}
                    </p>
                </div>
            </div>

            <div style="margin-top: 40px;">
                <p style="color: #666;">
                    Gunakan menu navigasi di sebelah kiri untuk mengelola akun pengguna, data siswa, dan melihat progres klasterisasi.
                </p>
            </div>
        @endif

        {{-- Konten khusus untuk Guru --}}
        @if(auth()->user()->level == 'Guru')
            <p style="color: #555; font-size: 16px; margin-bottom: 25px;">
                Ini adalah halaman utama <strong>Guru</strong> pada Sistem Pengelompokan Siswa Berdasarkan Performa Akademik.
            </p>

            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                {{-- Card Data Siswa --}}
                <div style="background-color: #6c6cf0; color: white; flex: 1; min-width: 220px; border-radius: 12px; padding: 25px;">
                    <h3 style="margin: 0 0 10px;">👥 Data Siswa</h3>
                    <p style="font-size: 24px; font-weight: bold;">
                        {{ $totalSiswa ?? 432 }}
                    </p>
                </div>

                {{-- Card Riwayat Klasterisasi --}}
                <div style="background-color: #a0a0f2; color: white; flex: 1; min-width: 220px; border-radius: 12px; padding: 25px;">
                    <h3 style="margin: 0 0 10px;">📊 Proses Pengelompokan</h3>
                    <p style="font-size: 24px; font-weight: bold;">
                        {{ $totalRiwayat ?? 58 }}
                    </p>
                </div>

                {{-- Card Data Siswa --}}
                <div style="background-color: #6c6cf0; color: white; flex: 1; min-width: 220px; border-radius: 12px; padding: 25px;">
                    <h3 style="margin: 0 0 10px;">📈 Hasil dan Deskripsi</h3>
                    <p style="font-size: 24px; font-weight: bold;">
                        {{ $totalSiswa ?? 43 }}
                    </p>
                </div>
            </div>

            <div style="margin-top: 40px;">
                <p style="color: #666;">
                    Gunakan menu navigasi di sebelah kiri untuk mengelola data siswa, input nilai, dan melihat hasil klasterisasi.
                </p>
            </div>
        @endif
    </div>
@endsection
