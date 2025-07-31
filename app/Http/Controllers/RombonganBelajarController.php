<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RombonganBelajar;

class RombonganBelajarController extends Controller
{
    public function index()
    {
        $rombonganbelajar = RombonganBelajar::with('user')->latest()->get();
        return view('rombonganbelajar.index', compact('rombonganbelajar'));
    }

    public function show($id)
    {
        $rombonganbelajar = RombonganBelajar::with('user')->findOrFail($id);
        return view('rombonganbelajar.show', compact('rombonganbelajar'));
    }

    public function destroy($id)
    {
        $rombonganbelajar = RombonganBelajar::findOrFail($id);
        $rombonganbelajar->delete();

        return redirect()->route('rombonganbelajar.index')->with('success', 'Riwayat berhasil dihapus');
    }
}
