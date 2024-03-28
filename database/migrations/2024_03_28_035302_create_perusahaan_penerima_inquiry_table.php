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

        Schema::create('perusahaan_penerima_inquiry', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_inquiry');
            $table->foreign('id_inquiry')->references('id_inquiry')->on('profile_inquiry');
            $table->bigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('master_perusahaan');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_penerima_inquiry');
    }
};
