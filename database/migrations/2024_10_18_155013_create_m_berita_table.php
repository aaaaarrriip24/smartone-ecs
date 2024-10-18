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
        Schema::create('berita', function (Blueprint $table) {
            $table->id(); // ID unik
            $table->string('judul')->nullable(); // Judul berita, nullable
            $table->text('isi')->nullable(); // Isi berita, nullable
            $table->text('gambar')->nullable(); // Nama file gambar dalam format teks, nullable
            $table->unsignedBigInteger('id_penulis')->nullable(); // ID penulis, nullable
            $table->timestamps(); // Untuk created_at dan updated_at
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes

            // Jika Anda ingin menambahkan foreign key
            // $table->foreign('id_penulis')->references('id')->on('users')->onDelete('cascade');
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
