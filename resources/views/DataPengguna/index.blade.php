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
    }

    .header-section h4 {
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .btn-add {
        background: #fff;
        color: #4B49AC;
        border: 2px solid #4B49AC;
        font-weight: 500;
        border-radius: 8px;
        padding: 6px 14px;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        background: #4B49AC;
        color: #fff;
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
        <h4>Kelola Akun Pengguna</h4>
        @if (auth()->user()->level == 'Admin')
        <a href="{{ route('datapengguna.create') }}" class="btn-add">
            <i class="bi bi-plus"></i> Tambah Data Pengguna
        </a>
        @endif
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
    @endif

    @if ($datapengguna->isEmpty())
    <div class="alert alert-warning text-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> Tidak ada data pengguna.
    </div>
    @else
    <div class="table-responsive">
        <table class="formal-table">
            <thead>
                <tr>
                    <th>No</th>
                    {{-- <th>NUPTK</th> --}}
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Passwod</th>
                    {{-- <th>No Telepon</th> --}}
                    {{-- <th>Tanggal Lahir</th> --}}
                    {{-- <th>Jenis Kelamin</th> --}}
                    {{-- <th>Alamat</th> --}}
                    {{-- <th>Mata Pelajaran</th> --}}
                    {{-- <th>Jabatan</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datapengguna as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nuptk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->no_telpon }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        @switch($item->mata_pelajaran)
                            @case('Bahasa Indonesia')
                                <span class="badge bg-success">Bahasa Indonesia</span>
                                @break
                            @case('Matematika')
                                <span class="badge bg-primary">Matematika</span>
                                @break
                            @case('Bahasa Inggris')
                                <span class="badge bg-warning text-dark">Bahasa Inggris</span>
                                @break
                            @default
                                <span class="badge bg-secondary">Lainnya</span>
                        @endswitch
                    </td>
                    <td>{{ $item->jabatan }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('datapengguna.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('datapengguna.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
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
