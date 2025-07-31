<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatProses;

class RiwayatGuruController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatProses::with('user')->latest()->get();
        return view('riwayatguru.index', compact('riwayat'));
    }

    public function show($id)
    {
        $riwayat = RiwayatProses::with('user')->findOrFail($id);
        return view('riwayatguru.show', compact('riwayat'));
    }

    public function destroy($id)
    {
        $riwayat = RiwayatProses::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('riwayatguru.index')->with('success', 'Riwayat berhasil dihapus');
    }
}
