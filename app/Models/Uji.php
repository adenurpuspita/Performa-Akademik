<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Uji extends Model
{
	use HasFactory;

	protected $table = 'uji';

	protected $fillable = ['nama', 'pekerjaan', 'penghasilan', 'tabungan', 'pinjaman', 'status_pinjaman'];


}
