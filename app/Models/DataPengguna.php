<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DataPengguna extends Model
{
	use HasFactory;

	protected $table = 'datapengguna';

	
	protected $fillable = ['nuptk', 'nama', 'no_telpon', 'tanggal_lahir', 'jenis_kelamin', 'password', 'alamat', 'mata_pelajaran', 'jabatan'];

	
}
