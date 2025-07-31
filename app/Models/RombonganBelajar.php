<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RombonganBelajar extends Model
{
    use HasFactory;

    protected $table = 'rombongan_belajar'; // harus sesuai dengan nama tabel migrasi

    protected $fillable = [
        'nuptk',
        'nama',
        'kelas',
        'jumlah_siswa',
        'semester',
        'jurusan',
        'tingkat_kelas',
    ];
}
