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

        Schema::create('profile_bm', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_bm');
            $table->string('pelaksanaan_bm');
            $table->bigInteger('id_negara_buyer');
            $table->foreign('id_negara_buyer')->references('id_negara')->on('t_negara');
            $table->string('info_asal_buyer');
            $table->string('nama_buyer');
            $table->string('email_buyer');
            $table->string('telp_buyer');
            $table->string('foto_kegiatan');
            $table->string('catatan');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_bm');
    }
};
