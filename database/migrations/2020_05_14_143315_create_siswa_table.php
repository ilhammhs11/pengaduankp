<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('nis')->primary();
            $table->string('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
            $table->string('jk');
            $table->text('alamat');
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
        Schema::dropIfExists('siswa');
    }
}
