<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilHitungan;

class HasilHitunganController extends Controller
{
    public function index()
    {
        $hasilhitungan = HasilHitungan::with('user')->latest()->get();
        return view('hasilhitungan.index', compact('hasilhitungan'));
    }

    public function show($id)
    {
        $hasilhitungan = HasilHitungan::with('user')->findOrFail($id);
        return view('hasilhitungan.show', compact('hasilhitungan'));
    }

    public function destroy($id)
    {
        $hasilhitungan = HasilHitungan::findOrFail($id);
        $hasilhitungan->delete();

        return redirect()->route('hasilhitungan.index')->with('success', 'Riwayat berhasil dihapus');
    }
}
