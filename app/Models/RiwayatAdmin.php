<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAdmin extends Model
{
    use HasFactory;

    protected $table = 'riwayat_admin'; // sesuai migration

    protected $fillable = [
        'nama_proses',
        'jumlah_siswa',
        'user_id',
        'waktu_proses',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
