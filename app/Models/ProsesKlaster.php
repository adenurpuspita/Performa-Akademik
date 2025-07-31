<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesKlaster extends Model
{
    use HasFactory;

    protected $table = 'nilai_siswa';

    protected $fillable = [
        'nisn',
        'nama',
        // Kognitif
        'mengingat',
        'memahami',
        'mengaplikasikan',
        // Afektif
        'menerima',
        'menanggapi',
        'menghargai',
        // Psikomotorik
        'meniru',
        'manipulasi',
        'presisi',
    ];
}
