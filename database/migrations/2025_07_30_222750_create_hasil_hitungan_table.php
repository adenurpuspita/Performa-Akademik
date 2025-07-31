<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasilhitungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proses')->nullable();  // Nama proses/label, opsional
            $table->unsignedBigInteger('jumlah_siswa')->nullable();  // Jumlah siswa pada proses
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User/admin yang menjalankan
            $table->timestamp('waktu_proses')->nullable();  // Waktu proses clustering dilakukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasilhitungan');
    }
};
