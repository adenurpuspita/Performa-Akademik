@extends('layouts.app')

@section('content')
<div class="container py-4">
    <form action="{{ route('anggota.kirimKeDataLatih') }}" method="POST">
        @csrf

        <div class="card shadow-sm p-4 bg-white rounded">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">
                    <i class="bi bi-person-lines-fill me-1"></i> Data Anggota yang Pernah Meminjam
                </h4>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="bi bi-send"></i> Kirim ke Data Latih
                    </button>
                    <a href="{{ route('anggota.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Tabungan</th>
                            <th>Pinjaman</th>
                            <th>Status Pinjaman</th>
                            <th>Status Kelayakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotaPernahMeminjam as $index => $anggota)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="anggota_ids[]" value="{{ $anggota->id }}">
                            </td>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $anggota->nik }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->pekerjaan }}</td>
                            <td>Rp {{ number_format($anggota->penghasilan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($anggota->tabungan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($anggota->pinjaman, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="badge bg-{{ $anggota->status_pinjaman == 'Lunas' ? 'success' : ($anggota->status_pinjaman == 'Menunggak' ? 'danger' : ($anggota->status_pinjaman == 'Belum Lunas' ? 'warning text-dark' : 'secondary')) }}">
                                    {{ $anggota->status_pinjaman }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-{{ $anggota->status_kelayakan == 'Layak' ? 'success' : ($anggota->status_kelayakan == 'Tidak Layak' ? 'danger' : 'secondary') }}">
                                    {{ $anggota->status_kelayakan ?? '-' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">Tidak ada data anggota yang pernah meminjam.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
<script>
    document.getElementById('selectAll').addEventListener('change', function () {
        let checkboxes = document.querySelectorAll('input[name="anggota_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
@endsection
