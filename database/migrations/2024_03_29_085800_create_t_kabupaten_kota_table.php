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
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id')->on('t_provinsi');
            $table->string('nama_kabupaten_kota');
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
        Schema::dropIfExists('t_kabupaten_kota');
    }
};
