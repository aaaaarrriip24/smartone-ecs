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
    }
}
