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
        Schema::create('staf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ruangan')->nullable();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->integer('user_id')->nullable();

            
            $table->timestamps();
            
            $table->foreign('id_ruangan')->references('id')->on('ruangan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
