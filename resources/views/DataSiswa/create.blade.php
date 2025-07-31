@extends('layouts.app')

@section('content')
<style>
    /* Card */
    .card {
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border: none;
        background-color: #fff;
    }

    /* Label form */
    label {
        display: block;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 6px;
        font-size: 0.95rem;
        letter-spacing: 0.02em;
    }

    /* Input text, date, select */
    input[type="text"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 10px 14px;
        font-size: 1rem;
        color: #34495e;
        background-color: #fefefe;
        border: 2px solid #d1d5db; /* abu-abu terang */
        border-radius: 12px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-sizing: border-box;
    }

    /* Textarea khusus */
    textarea {
        min-height: 90px;
        resize: vertical;
    }

    /* Hover and focus effect */
    input[type="text"]:hover,
    input[type="date"]:hover,
    select:hover,
    textarea:hover {
        border-color: #3b82f6; /* biru muda */
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #2563eb; /* biru medium */
        box-shadow: 0 0 8px rgba(37, 99, 235, 0.3);
        background-color: #fff;
    }

    /* Tombol */
    .btn-primary {
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    .btn-outline-secondary {
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 1rem;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #e2e8f0;
        color: #1e40af;
    }

    /* Heading */
    h4.text-primary {
        font-weight: 700;
        color: #2563eb;
        font-size: 1.6rem;
        margin-bottom: 1.5rem;
        letter-spacing: 0.02em;
    }
</style>

<div class="card p-4 mb-5">
    <h4 class="text-primary">
        <i class="bi bi-person-plus-fill me-2"></i> Tambah Data Siswa
    </h4>

    <form action="{{ route('datasiswa.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="" required>
        </div>

        <div class="mb-4">
            <label for="nisn">NISN</label>
            <input type="text" id="nisn" name="nisn" required>
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>

        <div class="mb-4">
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" required>
        </div>

        <div class="mb-4">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat"></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save2 me-1"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
