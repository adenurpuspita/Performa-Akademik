<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\Siswa;

class DataSiswaController extends Controller
{
    // Menampilkan semua data siswa
    public function index()
    {
        $datasiswa = DataSiswa::latest()->get();
        return view('datasiswa.index', compact('datasiswa'));
    }

    // Menampilkan form input data siswa
    public function create()
    {
        return view('datasiswa.create');
    }

    // Simpan data siswa ke dua tabel
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'nisn'           => 'required|string|max:20|unique:data_siswa,nisn',
            'jenis_kelamin'  => 'required|string|in:Laki-laki,Perempuan',
            'tanggal_lahir'  => 'required|date',
            'kelas'          => 'required|string|max:10',
            'alamat'         => 'nullable|string|max:255',
        ]);

        // Simpan ke tabel data_siswa
        DataSiswa::create($validated);

        // Cek apakah nisn sudah ada di tabel siswa, jika belum maka simpan
        if (!Siswa::where('nisn', $validated['nisn'])->exists()) {
            Siswa::create($validated);
        }

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil ditambahkan ke dua tabel.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $datasiswa = DataSiswa::findOrFail($id);
        return view('datasiswa.edit', compact('datasiswa'));
    }

    // Update data siswa di dua tabel
    public function update(Request $request, $id)
    {
        $datasiswa = DataSiswa::findOrFail($id);

        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'nisn'           => 'required|string|max:20|unique:data_siswa,nisn,' . $datasiswa->id,
            'jenis_kelamin'  => 'required|string|in:Laki-laki,Perempuan',
            'tanggal_lahir'  => 'required|date',
            'kelas'          => 'required|string|max:10',
            'alamat'         => 'nullable|string|max:255',
        ]);

        // Update di tabel data_siswa
        $datasiswa->update($validated);

        // Update di tabel siswa berdasarkan NISN
        $siswa = Siswa::where('nisn', $datasiswa->nisn)->first();
        if ($siswa) {
            $siswa->update($validated);
        }

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil diperbarui di dua tabel.');
    }

    // Hapus data siswa di dua tabel
    public function destroy($id)
    {
        $datasiswa = DataSiswa::findOrFail($id);

        // Hapus dari tabel siswa berdasarkan NISN
        Siswa::where('nisn', $datasiswa->nisn)->delete();

        // Hapus dari tabel data_siswa
        $datasiswa->delete();

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil dihapus dari dua tabel.');
    }

    // Import data dari file Excel (placeholder)
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Contoh jika menggunakan Laravel Excel (implementasi disesuaikan)
        // Excel::import(new DataSiswaImport, $request->file('file'));

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil diimport.');
    }
}
