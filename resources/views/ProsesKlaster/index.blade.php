@extends('layouts.app')
@section('content')
<style>
    /* Container tombol */
    .action-bar {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    /* Form import agar input file dan tombol sejajar */
    .import-form {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: nowrap;
        max-width: 360px;
        width: 100%;
    }

    .import-form input[type="file"] {
        flex-grow: 1;
        min-width: 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 5px 8px;
        font-size: 0.9rem;
    }

    .import-form input[type="file"]:focus {
        outline: none;
        border-color: #0d6efd;
        box-shadow: 0 0 4px #0d6efd;
    }

    /* Tombol utama */
    .btn-primary, .btn-success {
        border-radius: 5px;
        padding: 6px 14px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    .btn-success:hover {
        background-color: #198754cc;
    }

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
    }

    thead th {
        background-color: #e9ecef;
        padding: 8px 10px;
        text-align: center;
        border: 1px solid #dee2e6;
        font-weight: 600;
    }

    tbody td {
        padding: 8px 10px;
        border: 1px solid #dee2e6;
        vertical-align: middle;
        text-align: center;
    }

    tbody td:nth-child(3) {
        text-align: left;
        font-weight: 500;
        color: #333;
    }

    tbody tr:hover {
        background-color: #f1f3f5;
    }

    /* Tombol aksi kecil */
    .btn-sm {
        font-size: 0.85rem;
        padding: 4px 10px;
        border-radius: 5px;
        font-weight: 600;
        transition: background-color 0.3s ease;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-warning.btn-sm {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning.btn-sm:hover {
        background-color: #e0a800;
    }

    .btn-danger.btn-sm {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger.btn-sm:hover {
        background-color: #b02a37;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 767.98px) {
        .action-bar {
            justify-content: center;
        }

        .import-form {
            max-width: 100%;
        }
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold">Data Pengelompokan Siswa</h2>

    {{-- Flash Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Action Buttons --}}
    <div class="action-bar">
        <form action="{{ route('prosesklaster.index') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file" class="form-control" required>
            <button type="submit" class="btn btn-primary">📥 Import Excel</button>
        </form>

        <a href="{{ route('prosesklaster.create') }}" class="btn btn-success">➕ Tambah Siswa</a>
    </div>

    {{-- Table --}}
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
                    <th>Menerima</th>
                    <th>Menanggapi</th>
                    <th>Menghargai</th>
                    <th>Meniru</th>
                    <th>Manipulasi</th>
                    <th>Presisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prosesklaster as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nisn }}</td>
                        <td class="text-start">{{ $data->nama }}</td>
                        <td>{{ $data->mengingat }}</td>
                        <td>{{ $data->memahami }}</td>
                        <td>{{ $data->mengaplikasikan }}</td>
                        <td>{{ $data->menerima }}</td>
                        <td>{{ $data->menanggapi }}</td>
                        <td>{{ $data->menghargai }}</td>
                        <td>{{ $data->meniru }}</td>
                        <td>{{ $data->manipulasi }}</td>
                        <td>{{ $data->presisi }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('prosesklaster.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('prosesklaster.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
