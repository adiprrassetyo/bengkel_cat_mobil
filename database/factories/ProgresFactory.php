<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progres>
 */
class ProgresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'perbaikan_id' => mt_rand(1, 15),
            'aktivitas' => $this->faker->word(),
            'keterangan' => $this->faker->sentence(10),
            'waktu_tanggal' => $this->faker->dateTime(),
            'persentase' => mt_rand(20, 100),
        ];
    }
}
