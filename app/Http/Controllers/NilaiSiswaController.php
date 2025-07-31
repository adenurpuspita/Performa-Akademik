<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiSiswa;

class NilaiSiswaController extends Controller
{
    // Menampilkan semua data nilai siswa
    public function index()
    {
        $nilaisiswa = NilaiSiswa::all();
        return view('nilaisiswa.index', compact('nilaisiswa'));
    }

    // Menampilkan form untuk tambah nilai
    public function create()
    {
        return view('nilaisiswa.create');
    }

    // Menyimpan data nilai siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn'             => 'required|string|max:20',
            'nama'             => 'required|string|max:255',
            'mengingat'        => 'required|numeric',
            'memahami'         => 'required|numeric',
            'mengaplikasikan'  => 'required|numeric',
            'menganalisis'     => 'required|numeric',
            'menerima'         => 'required|numeric',
            'menanggapi'       => 'required|numeric',
            'menghargai'       => 'required|numeric',
            'meniru'           => 'required|numeric',
            'manipulasi'       => 'required|numeric',
            'presisi'          => 'required|numeric',
            'artikulasi'       => 'required|numeric',
        ]);

        NilaiSiswa::create($request->all());

        return redirect()->route('nilaisiswa.index')->with('success', 'Data nilai siswa berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $nilaisiswa = NilaiSiswa::findOrFail($id);
        return view('nilaisiswa.edit', compact('nilaisiswa'));
    }

    // Menyimpan perubahan
    public function update(Request $request, $id)
    {
        $nilaisiswa = NilaiSiswa::findOrFail($id);

        $request->validate([
            'nisn'             => 'required|string|max:20',
            'nama'             => 'required|string|max:255',
            'mengingat'        => 'required|numeric',
            'memahami'         => 'required|numeric',
            'mengaplikasikan'  => 'required|numeric',
            'menganalisis'     => 'required|numeric',
            'menerima'         => 'required|numeric',
            'menanggapi'       => 'required|numeric',
            'menghargai'       => 'required|numeric',
            'meniru'           => 'required|numeric',
            'manipulasi'       => 'required|numeric',
            'presisi'          => 'required|numeric',
            'artikulasi'       => 'required|numeric',
        ]);

        $nilaisiswa->update($request->all());

        return redirect()->route('nilaisiswa.index')->with('success', 'Data nilai siswa berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $nilaisiswa = NilaiSiswa::findOrFail($id);
        $nilaisiswa->delete();

        return redirect()->route('nilaisiswa.index')->with('success', 'Data nilai siswa berhasil dihapus.');
    }
}
