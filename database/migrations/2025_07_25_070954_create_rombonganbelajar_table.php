<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rombongan_belajar', function (Blueprint $table) {
            $table->id();
            $table->string('nuptk', 20)->unique();    // NUPTK guru
            $table->string('nama', 255);             // Nama guru / wali kelas
            $table->string('kelas', 10);             // Nama kelas (misal: X IPA 1)
            $table->integer('jumlah_siswa');         // Jumlah siswa di kelas
            $table->string('semester', 10);          // Semester (misal: Ganjil/Genap)
            $table->string('jurusan', 100);          // Jurusan (misal: IPA/IPS)
            $table->string('tingkat_kelas', 10);     // Tingkat kelas (misal: X, XI, XII)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rombongan_belajar');
    }
};
