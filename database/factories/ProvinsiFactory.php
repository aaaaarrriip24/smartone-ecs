<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProvinsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_provinsi' => $this->faker->name,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ];
    }
}
