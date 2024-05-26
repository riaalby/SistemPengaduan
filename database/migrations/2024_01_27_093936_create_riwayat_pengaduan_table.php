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
        Schema::create('riwayat_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_pengaduan')->nullable();

            $table->timestamps();

            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pengaduan');
    }
};
