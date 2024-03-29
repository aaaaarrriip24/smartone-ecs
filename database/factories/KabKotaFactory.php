<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KabKotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_provinsi' => 1,
            'nama_kabupaten_kota' => $this->faker->name,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ];
    }
}
