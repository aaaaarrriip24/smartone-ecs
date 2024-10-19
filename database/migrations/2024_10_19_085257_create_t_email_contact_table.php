<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEmailContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_email_contact', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable(); // Kolom email menjadi nullable
            $table->string('subject')->nullable(); // Kolom subject menjadi nullable
            $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Menambahkan dukungan soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_email_contact');
    }
}
