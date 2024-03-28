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

        Schema::create('profile_inquiry', function (Blueprint $table) {
            $table->id();
            $table->string('kode_inquiry');
            $table->date('tanggal_inquiry');
            $table->string('produk_yang_diminta');
            $table->integer('qty');
            $table->string('satuan_qty');
            $table->unsignedBigInteger('id_negara_asal_inquiry');
            $table->string('pihak_buyer');
            $table->string('nama_buyer');
            $table->string('email_buyer');
            $table->string('telp_buyer');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_inquiry');
    }
};
