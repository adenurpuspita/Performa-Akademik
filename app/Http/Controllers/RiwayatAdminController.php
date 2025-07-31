<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatProses;

class RiwayatAdminController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatProses::with('user')->latest()->get();
        return view('riwayatadmin.index', compact('riwayat'));
    }

    public function show($id)
    {
        $riwayat = RiwayatProses::with('user')->findOrFail($id);
        return view('riwayatadmin.show', compact('riwayat'));
    }

    public function destroy($id)
    {
        $riwayat = RiwayatProses::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('riwayatadmin.index')->with('success', 'Riwayat berhasil dihapus');
    }
}
