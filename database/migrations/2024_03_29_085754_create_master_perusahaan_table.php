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

        Schema::create('m_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->unsignedBigInteger('tipe_perusahaan');
            $table->foreign('tipe_perusahaan')->references('id')->on('master_tipe_perusahaan');
            $table->unsignedBigInteger('alamat_provinsi');
            $table->foreign('alamat_provinsi')->references('id')->on('t_provinsi');
            $table->unsignedBigInteger('alamat_kabkota');
            $table->foreign('alamat_kabkota')->references('id')->on('t_kabupaten_kota');
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
        Schema::dropIfExists('m_perusahaan');
    }
};
