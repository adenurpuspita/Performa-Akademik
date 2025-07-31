@extends('layouts.app')

@section('content')
<style>
    .card-custom {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .header-section h4 {
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .btn-add,
    .btn-import {
        background: #fff;
        border: 2px solid #4B49AC;
        color: #4B49AC;
        border-radius: 8px;
        font-weight: 500;
        font-size: 14px; /* Samakan font size */
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        height: 40px;
        padding: 0 16px;
    }

    .btn-add:hover,
    .btn-import:hover {
        background: #4B49AC;
        color: #fff;
    }

    .button-group {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .form-import {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-import input[type="file"] {
        max-width: 200px;
        font-size: 14px;
        height: 40px;
        padding: 6px;
    }

    table.formal-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
    }

    .formal-table th,
    .formal-table td {
        border: 1px solid #ccc;
        padding: 10px 12px;
        text-align: center;
        vertical-align: middle;
    }

    .formal-table th {
        background-color: #e9e9f1;
        color: #333;
        font-weight: 600;
    }

    .formal-table tbody tr:hover {
        background-color: #f9f9f9;
    }
</style>

<div class="card-custom">
    <div class="header-section">
        <h4>Data Siswa</h4>

        <div class="button-group">
            {{-- Import di sebelah kiri --}}
            <form action="{{ route('datasiswa.index') }}" method="POST" enctype="multipart/form-data" class="form-import">
                @csrf
                <input type="file" name="file" class="form-control form-control-sm" required>
                <button type="submit" class="btn-import">
                    <i class="bi bi-upload"></i> Import
                </button>
            </form>

            {{-- Tambah siswa di sebelah kanan --}}
            <a href="{{ route('datasiswa.create') }}" class="btn-add">
                <i class="bi bi-plus"></i> Tambah Siswa
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if($datasiswa->isEmpty())
        <div class="alert alert-warning text-center rounded-3 shadow-sm">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Belum ada data siswa.
        </div>
    @else
        <div class="table-responsive">
            <table class="formal-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datasiswa as $index => $siswa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d M Y') }}</td>
                            <td><span class="badge bg-info text-dark">{{ $siswa->kelas }}</span></td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('datasiswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('datasiswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
