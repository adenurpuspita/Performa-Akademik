<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uji', function (Blueprint $table) {
			$table->id();
			$table->string('nama')->nullable();
			$table->string('pekerjaan')->nullable();
			$table->integer('penghasilan')->nullable();
			$table->integer('tabungan')->nullable();
			$table->integer('pinjaman')->nullable();
			$table->string('status_pinjaman')->nullable();
			$table->timestamps();

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('uji');
	}
};
