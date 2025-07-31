<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proses_klaster', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20);
            $table->string('nama', 255);
            $table->decimal('mengingat', 8, 2);
            $table->decimal('memahami', 8, 2);
            $table->decimal('mengaplikasikan', 8, 2);
            $table->decimal('menerima', 8, 2);
            $table->decimal('menanggapi', 8, 2);
            $table->decimal('menghargai', 8, 2);
            $table->decimal('meniru', 8, 2);
            $table->decimal('manipulasi', 8, 2);
            $table->decimal('presisi', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proses_klaster');
    }
};
