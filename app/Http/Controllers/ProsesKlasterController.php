<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesKlaster;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProsesKlasterImport;

class ProsesKlasterController extends Controller
{
    // Menampilkan semua data nilai siswa
    public function index()
    {
        $prosesklaster = ProsesKlaster::all();
        return view('prosesklaster.index', compact('prosesklaster'));
    }

    // Menampilkan form untuk tambah nilai
    public function create()
    {
        return view('prosesklaster.create');
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
            'menerima'         => 'required|numeric',
            'menanggapi'       => 'required|numeric',
            'menghargai'       => 'required|numeric',
            'meniru'           => 'required|numeric',
            'manipulasi'       => 'required|numeric',
            'presisi'          => 'required|numeric',
            
        ]);

        ProsesKlaster::create($request->all());

        return redirect()->route('prosesklaster.index')->with('success', 'Data nilai siswa berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $prosesklaster = ProsesKlaster::findOrFail($id);
        return view('prosesklaster.edit', compact('prosesklaster'));
    }

    // Menyimpan perubahan
    public function update(Request $request, $id)
    {
        $prosesklaster = ProsesKlaster::findOrFail($id);

        $request->validate([
            'nisn'             => 'required|string|max:20',
            'nama'             => 'required|string|max:255',
            'mengingat'        => 'required|numeric',
            'memahami'         => 'required|numeric',
            'mengaplikasikan'  => 'required|numeric',
            'menerima'         => 'required|numeric',
            'menanggapi'       => 'required|numeric',
            'menghargai'       => 'required|numeric',
            'meniru'           => 'required|numeric',
            'manipulasi'       => 'required|numeric',
            'presisi'          => 'required|numeric',
            
        ]);

        $prosesklaster->update($request->all());

        return redirect()->route('prosesklaster.index')->with('success', 'Data nilai siswa berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $prosesklaster = ProsesKlaster::findOrFail($id);
        $prosesklaster->delete();

        return redirect()->route('prosesklaster.index')->with('success', 'Data nilai siswa berhasil dihapus.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new ProsesKlasterImport, $request->file('file'));
            return redirect()->route('prosesklaster.index')->with('success', 'Data berhasil diimport.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
