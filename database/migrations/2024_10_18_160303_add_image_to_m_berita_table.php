<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToMBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_berita', function (Blueprint $table) {
            $table->string('image')->nullable()->after('terbaca'); // Menambahkan kolom image
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_berita', function (Blueprint $table) {
            $table->dropColumn('image'); // Menghapus kolom image saat rollback
        });
    }
}
