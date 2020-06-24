<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->string('id_tanggapan')->primary();
            $table->string('id_pengaduan')->references('id_pengaduan')->on('pengaduan')->onDelete('cascade');
            $table->string('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
            $table->date('tgl_tanggapan');
            $table->text('tanggapan');
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
        Schema::dropIfExists('tanggapan');
    }
}
