<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPenggunaController extends Controller
{
    public function dashboard()
{
    return view('dashboard'); // sesuaikan dengan file Blade yang kamu punya
}

    public function index()
    {
        $datapengguna= DataPengguna::all();
        return view('datapengguna.index', compact('datapengguna'));
    }

    public function create()
    {
        return view('datapengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nuptk'           => 'required|string|max:20|unique:datapengguna,nuptk',
        'nama'            => 'required|string|max:255',
        'no_telpon'       => 'nullable|string|max:15',
        'tanggal_lahir'   => 'nullable|date',
        'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
        'password'        => 'required|string|min:6',
        'alamat'          => 'nullable|string|max:255',
        'mata_pelajaran'  => 'nullable|string|max:100',
        'jabatan'         => 'nullable|string|max:100',
    ]);

        DataPengguna::create($request->all());

        return redirect()->route('datapengguna.index')
                         ->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function show($id)
    {
        $datapengguna = DataPengguna::findOrFail($id);
        return view('datapengguna.show', compact('datapengguna'));
    }

    public function edit($id)
    {
        $datapengguna = DataPengguna::findOrFail($id);
        return view('datapengguna.edit', compact('datapengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nuptk'           => 'required|string|max:20|unique:pengguna,nuptk',
        'nama'            => 'required|string|max:255',
        'no_telpon'       => 'nullable|string|max:15',
        'tanggal_lahir'   => 'nullable|date',
        'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
        'password'        => 'required|string|min:6',
        'alamat'          => 'nullable|string|max:255',
        'mata_pelajaran'  => 'nullable|string|max:100',
        'jabatan'         => 'nullable|string|max:100',
    ]);

        $datapengguna = DataPengguna::findOrFail($id);
        $datapengguna->update($request->all());

        return redirect()->route('datapengguna.index')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $datapengguna = DataPengguna::findOrFail($id);
        $datapengguna->delete();

        return redirect()->route('datapengguna.index')
                         ->with('success', 'Data anggota berhasil dihapus.');
    }

    // public function tampilkanAnggotaPernahMeminjam()
    // {
    //     $anggotaPernahMeminjam = Anggota::where('status_pinjaman', '!=', 'Tidak Meminjam')
    //         ->where('status_kelayakan', '!=', '-')
    //         ->get();

    //     return view('anggota.pernah_meminjam', compact('anggotaPernahMeminjam'));
    // }

    // public function kirimKeDataLatih(Request $request)
    // {
    //     $ids = $request->anggota_ids;

    //     if (!$ids || count($ids) === 0) {
    //         return redirect()->back()->with('error', 'Tidak ada anggota yang dipilih.');
    //     }

    //     foreach ($ids as $id) {
    //         $anggota = Anggota::find($id);

    //         $exists = DB::table('latih')->where('nik', $anggota->nik)->exists();

    //             if (!$exists) {
    //                 DB::table('latih')->insert([
    //                     'nik' => $anggota->nik,
    //                     'nama' => $anggota->nama,
    //                     'pekerjaan' => $anggota->pekerjaan,
    //                     'penghasilan' => $anggota->penghasilan,
    //                     'tabungan' => $anggota->tabungan,
    //                     'pinjaman' => $anggota->pinjaman,
    //                     'status_pinjaman' => $anggota->status_pinjaman,
    //                     'status_kelayakan' => $anggota->status_kelayakan,
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);
    //             }

    //     }

        //return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dikirim ke data latih.');
    }

