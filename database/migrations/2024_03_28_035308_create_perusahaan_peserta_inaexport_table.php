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

        Schema::create('perusahaan_peserta_inaexport', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('master_perusahaan');
            $table->date('tanggal_registrasi_inaexport');
            $table->string('petugas_verifikator');
            $table->foreign('petugas_verifikator')->references('id_petugas')->on('t_petugas_admin');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_peserta_inaexport');
    }
};
