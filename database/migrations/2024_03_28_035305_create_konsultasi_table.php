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

        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('master_perusahaan');
            $table->date('tanggal_konsultasi');
            $table->integer('id_topik');
            $table->foreign('id_topik')->references('id_topik')->on('master_topik');
            $table->string('isi_konsultasi');
            $table->string('foto_pertemuan');
            $table->bigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id_petugas')->on('t_petugas_admin');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
