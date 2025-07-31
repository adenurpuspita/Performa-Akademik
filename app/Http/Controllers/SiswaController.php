<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $datasiswa = Siswa::all();
        return view('siswa.index', compact('datasiswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama'           => 'required|string|max:255',
        'nisn'           => 'required|string|max:20|unique:siswa,nisn',
        'jenis_kelamin'  => 'required|string|in:Laki-laki,Perempuan',
        'tanggal_lahir'  => 'required|date',
        'kelas'          => 'required|string|max:10',
        'alamat'         => 'nullable|string|max:255',
    ]);

    // Simpan ke tabel data_siswa
    DataSiswa::create($validated);

    // Cek dan simpan ke tabel siswa hanya jika belum ada
    if (!Siswa::where('nisn', $validated['nisn'])->exists()) {
        Siswa::create($validated);
    }

    return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil ditambahkan ke dua tabel.');
}
}
