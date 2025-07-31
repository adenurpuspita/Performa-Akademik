@extends('layouts.app')

@section('content')
<style>
  body {
    background-color: #f8fafc;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .page-header {
    color: #0d6efd;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 1.8rem;
    display: flex;
    align-items: center;
    gap: 0.7rem;
  }

  .filter-card {
    background: #fff;
    border-radius: 15px;
    padding: 1.4rem 2rem;
    box-shadow: 0 6px 15px rgba(13, 110, 253, 0.15);
    margin-bottom: 2.5rem;

    /* Jadikan flex container */
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  /* Grup dropdown filter di kiri */
  .filter-left {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .filter-left select {
    border-radius: 12px;
    border: 1.5px solid #dee2e6;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    transition: 0.3s ease;
    min-width: 140px;
  }

  .filter-left select:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 8px rgba(13, 110, 253, 0.4);
  }

  /* Grup search di kanan */
  .filter-right {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    min-width: 280px;
    max-width: 100%;
  }

  .filter-right input {
    border-radius: 12px;
    border: 1.5px solid #dee2e6;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    flex-grow: 1;
    transition: 0.3s ease;
  }

  .filter-right input:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 8px rgba(13, 110, 253, 0.4);
  }

  .btn-search {
    border-radius: 12px;
    background-color: #0d6efd;
    border: none;
    color: white;
    padding: 0 1.3rem;
    font-size: 1.1rem;
    transition: background-color 0.3s ease;
    cursor: pointer;
    height: 38px;
  }

  .btn-search:hover {
    background-color: #0847c1;
  }

  .card-student {
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.07);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    background-color: white;
    padding: 1.8rem 2rem;
    height: 100%;
    cursor: default;
  }

  .card-student:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
  }

  .student-name {
    font-weight: 700;
    font-size: 1.3rem;
    color: #0d6efd;
    margin-bottom: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.6rem;
  }

  .student-info {
    font-size: 0.95rem;
    color: #495057;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .badge-class {
    background: #cfe2ff;
    color: #084298;
    font-weight: 600;
    padding: 0.28rem 0.7rem;
    border-radius: 50px;
    font-size: 0.9rem;
  }

  .alert-no-data {
    font-weight: 600;
    font-size: 1.1rem;
    color: #dc3545;
    background-color: #f8d7da;
    padding: 1.3rem 2rem;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(220, 53, 69, 0.2);
  }

  /* Responsive: supaya di layar kecil dropdown dan search tetap rapi */
  @media (max-width: 575.98px) {
    .filter-card {
      flex-direction: column;
      gap: 1.2rem;
    }
    .filter-left {
      justify-content: center;
      gap: 0.8rem;
    }
    .filter-right {
      justify-content: center;
      width: 100%;
    }
    .filter-right input {
      max-width: 100%;
    }
  }
</style>

<div class="container py-4">
  <h4 class="page-header">
    <i class="bi bi-person-lines-fill"></i> Data Siswa
  </h4>

  {{-- Filter Card --}}
  <div class="filter-card">
    <div class="filter-left">
      <select aria-label="Filter Tahun">
        <option selected>Tahun</option>
        <option>2024</option>
        <option>2025</option>
      </select>
      <select aria-label="Filter Mata Pelajaran">
        <option selected>Mata Pelajaran</option>
        <option>Bahasa Indonesia</option>
        <option>Matematika</option>
      </select>
      <select aria-label="Filter Kelas">
        <option selected>Kelas</option>
        <option>X IPA 1</option>
        <option>X IPA 2</option>
      </select>
    </div>
    <div class="filter-right">
      <input type="text" placeholder="Cari Nama, NISN..." aria-label="Cari">
      <button class="btn-search" aria-label="Tombol Cari">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </div>

  {{-- Data Siswa --}}
  @if($datasiswa->isEmpty())
    <div class="alert-no-data text-center">
      <i class="bi bi-exclamation-triangle-fill"></i> Belum ada data siswa.
    </div>
  @else
    <div class="row g-4">
      @foreach($datasiswa as $siswa)
        <div class="col-md-6 col-lg-4">
          <div class="card-student">
            <h5 class="student-name">
              <i class="bi bi-person-fill"></i> {{ $siswa->nama }}
            </h5>
            <div class="student-info">
              <i class="bi bi-credit-card"></i> <strong>NISN:</strong> {{ $siswa->nisn }}
            </div>
            <div class="student-info">
              <i class="bi bi-gender-ambiguous"></i> <strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}
            </div>
            <div class="student-info">
              <i class="bi bi-calendar3"></i> <strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}
            </div>
            <div class="student-info">
              <i class="bi bi-mortarboard-fill"></i> <strong>Kelas:</strong> <span class="badge-class">{{ $siswa->kelas }}</span>
            </div>
            <div class="student-info">
              <i class="bi bi-geo-alt-fill"></i> <strong>Alamat:</strong> {{ $siswa->alamat }}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
