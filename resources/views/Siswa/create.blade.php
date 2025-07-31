{{-- @extends('layouts.app')


@section('content')

<div class="container">
    <h2>Tambah Data Obat</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan data yang Anda masukkan.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('obat.create.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_petani" class="form-label">Nama Petani</label>
            <input type="text" name="nama_petani" class="form-control" id="nama_petani" value="{{ old('nama_petani') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="no_tlp" class="form-label">Nomor Telepon</label>
            <input type="number" name="no_tlp" class="form-control" id="no_tlp" value="{{ old('no_tlp') }}" required>
        </div>

        <div class="mb-3">
            <label for="obat" class="form-label">Jenis Obat</label>
            <input type="text" name="obat" class="form-control" id="obat" value="{{ old('obat') }}" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_pupuk" class="form-label">Jumlah Obat</label>
            <input type="number" name="jumlah_obat" class="form-control" id="jumlah_obat" value="{{ old('jumlah_obat') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('obat') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
 --}}
