<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama');

            // Kognitif
            $table->integer('mengingat')->nullable();
            $table->integer('memahami')->nullable();
            $table->integer('mengaplikasikan')->nullable();
            $table->integer('menganalisis')->nullable();

            // Afektif
            $table->integer('menerima')->nullable();
            $table->integer('menanggapi')->nullable();
            $table->integer('menghargai')->nullable();

            // Psikomotorik
            $table->integer('meniru')->nullable();
            $table->integer('manipulasi')->nullable();
            $table->integer('presisi')->nullable();
            $table->integer('artikulasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_siswa');
    }
}
