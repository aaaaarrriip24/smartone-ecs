<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_perusahaan' => $this->faker->name,
            'nama_perusahaan' => $this->faker->company,
            'tipe_perusahaan' => rand(301,400),
            'alamat_provinsi' => 1,
            'alamat_kabkota' => rand(1,50),
            'alamat_perusahaan' => $this->faker->streetAddress,
            'nama_contact_person' => $this->faker->name,
            'telp_contact_person' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'website' => $this->faker->name,
            'status_kepemilikan' => $this->faker->text,
            'skala_perusahaan' => $this->faker->text,
            'jumlah_karyawan' => $this->faker->text,
            'kategori_produk' => $this->faker->text,
            'detail_produk_utama' => $this->faker->text,
            'merek_produk' => $this->faker->name,
            'hs_code' => $this->faker->name,
            'kapasitas_produksi' => $this->faker->randomDigitNotNull,
            'satuan_kapasitas_produksi' => $this->faker->name,
            'sertifikat' => $this->faker->name,
            'status' => $this->faker->randomDigitNotNull,
            'foto_produk_1' => Carbon::now(),
            'foto_produk_2' => $this->faker->name,
            'tanggal_regis' => Carbon::now(),
            'petugas_verifikator' => $this->faker->randomDigitNotNull,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ];
    }
}
