<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Petugas::factory(100)->create();
        \App\Models\Perusahaan::factory(100)->create();
        // \App\Models\Provinsi::factory(1)->create();
        // \App\Models\KabKota::factory(50)->create();
        // \App\Models\Tipe::factory(100)->create();
    }
}
