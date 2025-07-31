@extends('layouts.app')

@section('content')
<style>
    /* Container header: flex horizontal */
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
        gap: 10px;
    }

    /* Judul di kiri */
    .header-title {
        font-weight: 700;
        font-size: 1.8rem;
        color: #0d6efd;
        flex-grow: 1;
        min-width: 200px;
    }

    /* Container tombol di kanan */
    .header-actions {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-shrink: 0;
        min-width: 180px;
        max-width: 100%;
    }

    /* Style tombol import dan tambah agar sama */
    .btn-main {
        background-color: #0d6efd;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 5px 14px;
        font-weight: 600;
        font-size: 0.85rem;
        box-shadow: 0 3px 6px rgb(13 110 253 / 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        user-select: none;
    }

    .btn-main:hover,
    .btn-main:focus {
        background-color: #0b5ed7;
        box-shadow: 0 5px 12px rgb(11 94 215 / 0.5);
        transform: translateY(-1.5px);
        color: white;
        text-decoration: none;
    }

    .btn-add-siswa {
        flex-shrink: 0;
        min-width: 110px;
    }

    /* Styling tabel */
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 0.9rem;
    }

    thead th {
        background-color: #e9ecef;
        text-align: center;
        padding: 10px;
        border: 1px solid #dee2e6;
    }

    tbody td {
        padding: 8px 10px;
        border: 1px solid #dee2e6;
        vertical-align: middle;
        text-align: center;
    }

    tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    /* Tombol aksi kecil */
    .btn-sm {
        font-size: 0.8rem;
        padding: 4px 8px;
        border-radius: 8px;
        font-weight: 600;
        box-shadow: 0 2px 4px rgb(0 0 0 / 0.15);
        transition: all 0.3s ease;
    }

    .btn-warning.btn-sm {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
        box-shadow: 0 2px 5px rgb(255 193 7 / 0.4);
    }

    .btn-warning.btn-sm:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        box-shadow: 0 4px 8px rgb(224 168 0 / 0.6);
        transform: translateY(-1px);
    }

    .btn-danger.btn-sm {
        background-color: #dc3545;
        border-color: #dc3545;
        box-shadow: 0 2px 5px rgb(220 53 69 / 0.4);
        color: #fff;
    }

    .btn-danger.btn-sm:hover {
        background-color: #bd2130;
        border-color: #b21f2d;
        box-shadow: 0 4px 8px rgb(189 33 48 / 0.6);
        transform: translateY(-1px);
    }

    .action-buttons {
        display: flex;
        gap: 6px;
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 767.98px) {
        .header-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .header-actions {
            width: 100%;
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .btn-add-siswa {
            width: 100%;
            min-width: unset;
        }
    }
</style>

<div class="container mt-4">
    <div class="header-container">
        <h2 class="header-title">📊 Input Nilai Siswa</h2>

        <div class="header-actions">
            {{-- Tombol Import Excel --}}
            <form action="{{ route('nilaisiswa.import') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn-main">📥 Import Excel</button>
            </form>

            {{-- Tombol Tambah Siswa --}}
            <a href="{{ route('nilaisiswa.create') }}" class="btn-main btn-add-siswa">➕ Tambah Siswa</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Mengingat</th>
                    <th>Memahami</th>
                    <th>Mengaplikasikan</th>
                    <th>Menganalisis</th>
                    <th>Menerima</th>
                    <th>Menanggapi</th>
                    <th>Menghargai</th>
                    <th>Meniru</th>
                    <th>Manipulasi</th>
                    <th>Presisi</th>
                    <th>Artikulasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nilaisiswa as $index => $siswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td class="text-start">{{ $siswa->nama }}</td>
                        <td>{{ $siswa->mengingat }}</td>
                        <td>{{ $siswa->memahami }}</td>
                        <td>{{ $siswa->mengaplikasikan }}</td>
                        <td>{{ $siswa->menganalisis }}</td>
                        <td>{{ $siswa->menerima }}</td>
                        <td>{{ $siswa->menanggapi }}</td>
                        <td>{{ $siswa->menghargai }}</td>
                        <td>{{ $siswa->meniru }}</td>
                        <td>{{ $siswa->manipulasi }}</td>
                        <td>{{ $siswa->presisi }}</td>
                        <td>{{ $siswa->artikulasi }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('nilaisiswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                <form action="{{ route('nilaisiswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15" class="text-center text-muted">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
