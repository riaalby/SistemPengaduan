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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengaduan')->nullable();
            $table->longText('isi_pengaduan')->nullable();
            $table->unsignedBigInteger('id_ruangan')->nullable();
            $table->unsignedBigInteger('id_staf')->nullable();
            $table->string('gambar')->nullable();
            $table->string('status_enumi')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_ruangan')->references('id')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_staf')->references('id')->on('staf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
