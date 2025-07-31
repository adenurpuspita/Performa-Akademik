@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h4 class="mb-4 text-primary">Tambah Data Pengelompokan</h4>
    <form action="{{ route('datasiswa.store') }}" method="POST">
        @csrf

        {{-- Data Siswa --}}
        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <hr>
        <h5 class="text-secondary mt-4">Kognitif</h5>

        <div class="mb-3">
            <label>Mengingat</label>
            <input type="number" name="mengingat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Memahami</label>
            <input type="number" name="memahami" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mengaplikasikan</label>
            <input type="number" name="mengaplikasikan" class="form-control" required>
        </div>

        <hr>
        <h5 class="text-secondary mt-4">Afektif</h5>

        <div class="mb-3">
            <label>Menerima</label>
            <input type="number" name="menerima" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Menanggapi</label>
            <input type="number" name="menanggapi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Menghargai</label>
            <input type="number" name="menghargai" class="form-control" required>
        </div>

        <hr>
        <h5 class="text-secondary mt-4">Psikomotorik</h5>

        <div class="mb-3">
            <label>Meniru</label>
            <input type="number" name="meniru" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Manipulasi</label>
            <input type="number" name="manipulasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Presisi</label>
            <input type="number" name="presisi" class="form-control" required>
        </div>
       

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
