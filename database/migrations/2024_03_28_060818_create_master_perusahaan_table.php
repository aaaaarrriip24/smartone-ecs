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
        Schema::create('master_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->string('tipe_perusahaan');
            $table->integer('alamat_provinsi');
            $table->integer('alamat_kabkota');
            $table->string('alamat_perusahaan');
            $table->string('nama_contact_person');
            $table->string('telp_contact_person');
            $table->string('email')->unique();
            $table->string('website');
            $table->string('status_kepemilikan');
            $table->string('skala_perusahaan');
            $table->string('jumlah_karyawan');
            $table->string('kategori_produk');
            $table->string('detail_produk_utama');
            $table->string('merek_produk');
            $table->string('hs_code');
            $table->integer('kapasitas_produksi');
            $table->string('satuan_kapasitas_produksi');
            $table->string('sertifikat');
            $table->bigInteger('status');
            $table->string('foto_produk_1');
            $table->string('foto_produk_2');
            $table->date('tanggal_regis');
            $table->integer('petugas_verifikator');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_perusahaan');
    }
};
