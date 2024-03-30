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
        // \App\Models\Provinsi::factory(1)->create();
        // \App\Models\KabKota::factory(50)->create();
        // \App\Models\Tipe::factory(100)->create();
        // \App\Models\Perusahaan::factory(100)->create();
        // \App\Models\Topik::factory(5)->create();
        \App\Models\KProduk::factory(5)->create();
    }
    // public function run()
    // {
    //     $this->reset();

    //     $this->call(ProvincesSeeder::class);
    //     $this->call(CitiesSeeder::class);
    //     $this->call(DistrictsSeeder::class);
    //     $this->call(VillagesSeeder::class);
    // }

    // public function reset()
    // {
    //     Schema::disableForeignKeyConstraints();

    //     Kelurahan::truncate();
    //     Kecamatan::truncate();
    //     Kabupaten::truncate();
    //     Provinsi::truncate();

    //     Schema::disableForeignKeyConstraints();
    // }
}
