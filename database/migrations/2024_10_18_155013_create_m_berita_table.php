<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_berita', function (Blueprint $table) {
            $table->id(); // Membuat kolom id
            $table->string('judul_berita'); // Membuat kolom judul_berita
            $table->text('deskripsi'); // Membuat kolom deskripsi
            $table->unsignedBigInteger('id_penulis'); // Membuat kolom id_penulis
            $table->integer('terbaca')->default(0); // Membuat kolom terbaca dengan default 0
            $table->timestamps(); // Menambahkan created_at dan updated_at
            $table->softDeletes(); // Menambahkan deleted_at untuk soft delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_berita');
    }
}
