@extends('layouts.app')

@section('content')
<style>
    /* Styling bisa kamu sesuaikan lagi seperti di index prosesklaster */
    .table-responsive {
        overflow-x: auto;
    }
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
    tbody td.text-start {
        text-align: left;
        font-weight: 500;
        color: #333;
    }
    tbody tr:hover {
        background-color: #f1f3f5;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold">Riwayat Pengelompokan Siswa</h2>

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
                    <th>Nama Proses</th>
                    <th>Jumlah Siswa</th>
                    <th>Waktu Proses</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="text-start">{{ $item->nama_proses ?? 'Proses #' . $item->id }}</td>
                    <td>{{ $item->jumlah_siswa ?? '-' }}</td>
                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('riwayatadmin.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('riwayatadmin.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus riwayat ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada riwayat proses klaster.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
