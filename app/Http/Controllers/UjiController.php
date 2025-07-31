<?php

namespace App\Http\Controllers;

use App\Models\Uji;
use Illuminate\Http\Request;

class UjiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uji = Uji::all();
        return view('uji.index', compact('uji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uji.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:100',
            'penghasilan' => 'nullable|integer|min:0',
            'tabungan' => 'nullable|integer|min:0',
            'pinjaman' => 'nullable|integer|min:0',
            'status_pinjaman' => 'required|in:Lunas,Belum Lunas,menunggak',
        ]);

        Uji::create($request->all());

        return redirect()->route('uji.index')
                         ->with('success', 'Data Latih berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $uji = Uji::findOrFail($id);
        return view('uji.show', compact('uji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $uji = Uji::findOrFail($id); // Ambil data petani berdasarkan ID
    return view('uji.edit', compact('uji'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:100',
            'penghasilan' => 'nullable|integer|min:0',
            'tabungan' => 'nullable|integer|min:0',
            'pinjaman' => 'nullable|integer|min:0',
            'status_pinjaman' => 'required|in:Lunas,Belum Lunas,menunggak',
        ]);

        $uji= Uji::findOrFail($id);
        $uji->update($request->all());

        return redirect()->route('uji.index')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $uji = Uji::findOrFail($id);
        $uji->delete();

        return redirect()->route('uji.index')
                         ->with('success', 'Data anggota berhasil dihapus.');
    }
    
}

