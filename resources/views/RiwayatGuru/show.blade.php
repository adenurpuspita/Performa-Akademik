@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold">Detail Riwayat Proses</h2>

    <div class="card p-4">
        <p><strong>Nama Proses:</strong> {{ $riwayat->nama_proses ?? 'Proses #'.$riwayat->id }}</p>
        <p><strong>Jumlah Siswa:</strong> {{ $riwayat->jumlah_siswa ?? '-' }}</p>
        <p><strong>Waktu Proses:</strong> {{ $riwayat->waktu_proses ?? $riwayat->created_at->format('d M Y H:i') }}</p>
        <p><strong>Admin:</strong> {{ $riwayat->user->name ?? '-' }}</p>
    </div>
</div>
@endsection
