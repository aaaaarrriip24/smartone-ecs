<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('t_kabupaten_kota', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_provinsi')->references('id_provinsi')->on('t_provinsi');
            $table->bigInteger('id_kabupaten_kota');
            $table->string('nama_kabupaten_kota');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kabupaten_kota');
    }
};
