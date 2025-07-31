<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('datapengguna', function (Blueprint $table) {
        $table->id();
        $table->string('nuptk')->unique(); // seperti nik yang unik
        $table->string('nama')->nullable();
        $table->string('no_telpon')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        $table->string('password'); // simpan hash password
        $table->string('alamat')->nullable();
        $table->string('mata_pelajaran')->nullable();
        $table->string('jabatan')->nullable();
        $table->timestamps();
    });
    }


    public function down(): void
    {
        Schema::dropIfExists('datapengguna');
    }
};
