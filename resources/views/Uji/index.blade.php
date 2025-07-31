@extends('layouts.app')

@section('content')
<div class="container-fluid my-5 px-5"> {{-- GANTI container ke container-fluid --}}
    <div class="bg-white rounded shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary" style="font-family: 'Lora', serif;">
                📋 DATA UJI
            </h2>
            @if (auth()->user()->level == 'Admin')
                <a href="{{ route('uji.create.store') }}" class="btn btn-success shadow-sm">
                    <i class="bi bi-person-plus-fill"></i> Tambah Anggota
                </a>
            @endif
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if ($uji->isEmpty())
            <div class="alert alert-warning text-center shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Tidak ada data anggota koperasi.
            </div>
        @else
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Tabungan</th>
                            <th>Pinjaman</th>
                            <th>Status Pinjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uji as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>Rp {{ number_format($item->penghasilan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->tabungan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->pinjaman, 0, ',', '.') }}</td>
                                <td>
                                    @if ($item->status_pinjaman === 'Lunas')
                                        <span class="badge bg-success">{{ $item->status_pinjaman }}</span>
                                    @elseif ($item->status_pinjaman === 'Menunggak')
                                        <span class="badge bg-danger">{{ $item->status_pinjaman }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $item->status_pinjaman }}</span>
                                    @endif
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
