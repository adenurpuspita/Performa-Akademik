@extends('layouts.app') 

@section('content')
<style>
    body {
        background-color: #f4f6fb;
        font-family: 'Segoe UI', sans-serif;
    }

    .setting-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #fff;
        border-radius: 20px;
        padding: 40px 50px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .setting-title {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 30px;
        color: #333;
    }

    .form-section-title {
        font-weight: 600;
        font-size: 1.2rem;
        margin: 30px 0 15px;
        color: #555;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 5px;
        color: #444;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 10px 15px;
        font-size: 1rem;
        border: 1px solid #ccc;
        width: 100%;
    }

    .form-control:focus, .form-select:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 0 0.1rem rgba(108, 99, 255, 0.25);
    }

    .btn-save, .btn-back {
        background-color: #6c63ff;
        color: white;
        border: none;
        padding: 10px 25px;
        font-size: 1rem;
        border-radius: 12px;
        text-decoration: none;
        display: inline-block;
    }

    .btn-save:hover,
    .btn-back:hover {
        background-color: #594be2;
        color: white;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-col-6 {
        flex: 0 0 48%;
    }

    .form-col-12 {
        flex: 0 0 100%;
    }

    .action-buttons {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
        gap: 15px;
    }

    .import-section {
        margin-bottom: 30px;
    }

    .import-section form {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .import-section input[type="file"] {
        max-width: 300px;
    }
</style>

<div class="setting-container">
    <div class="setting-title">Nilai Siswa</div>

    {{-- Tombol Import Excel --}}
    <div class="import-section">
        <form action="{{ route('nilaisiswa.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control" required>
            <button type="submit" class="btn-save">📥 Import Excel</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nilaisiswa.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-col-6 mb-3">
                <label class="form-label">NISN</label>
                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}">
                @error('nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-col-6 mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- Kognitif --}}
            <h5>Ranah Kognitif (C)</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label>Mengingat (C1)</label>
                    <input type="number" name="mengingat" class="form-control" value="{{ old('mengingat') }}">
                </div>
                <div class="col-md-3">
                    <label>Memahami (C2)</label>
                    <input type="number" name="memahami" class="form-control" value="{{ old('memahami') }}">
                </div>
                <div class="col-md-3">
                    <label>Mengaplikasikan (C3)</label>
                    <input type="number" name="mengaplikasikan" class="form-control" value="{{ old('mengaplikasikan') }}">
                </div>
                <div class="col-md-3">
                    <label>Menganalisis (C4)</label>
                    <input type="number" name="menganalisis" class="form-control" value="{{ old('menganalisis') }}">
                </div>
            </div>

            {{-- Afektif --}}
            <h5>Ranah Afektif (A)</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label>Menerima (A1)</label>
                    <input type="number" name="menerima" class="form-control" value="{{ old('menerima') }}">
                </div>
                <div class="col-md-3">
                    <label>Menanggapi (A2)</label>
                    <input type="number" name="menanggapi" class="form-control" value="{{ old('menanggapi') }}">
                </div>
                <div class="col-md-3">
                    <label>Menghargai (A3)</label>
                    <input type="number" name="menghargai" class="form-control" value="{{ old('menghargai') }}">
                </div>
            </div>

            {{-- Psikomotor --}}
            <h5>Ranah Psikomotor (P)</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label>Meniru (P1)</label>
                    <input type="number" name="meniru" class="form-control" value="{{ old('meniru') }}">
                </div>
                <div class="col-md-3">
                    <label>Manipulasi (P2)</label>
                    <input type="number" name="manipulasi" class="form-control" value="{{ old('manipulasi') }}">
                </div>
                <div class="col-md-3">
                    <label>Presisi (P3)</label>
                    <input type="number" name="presisi" class="form-control" value="{{ old('presisi') }}">
                </div>
                <div class="col-md-3">
                    <label>Artikulasi (P4)</label>
                    <input type="number" name="artikulasi" class="form-control" value="{{ old('artikulasi') }}">
                </div>
            </div>

        <div class="action-buttons">
            <a href="{{ route('nilaisiswa.index') }}" class="btn-back">Kembali</a>
            <button type="submit" class="btn-save">Simpan</button>
        </div>
    </form>
</div>
@endsection
