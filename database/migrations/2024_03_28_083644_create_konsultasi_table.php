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
            $table->string('kode_konsultasi');
            $table->unsignedBigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id')->on('master_perusahaan');
            $table->date('tanggal_konsultasi');
            $table->unsignedBigInteger('id_topik');
            $table->foreign('id_topik')->references('id')->on('master_topik');
            $table->string('isi_konsultasi');
            $table->string('foto_pertemuan');
            $table->unsignedBigInteger('id_petugas');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
