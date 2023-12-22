<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_plat' => Str::random(10),
            'user_id' => mt_rand(1, 17),
            'merek' => $this->faker->randomElement(['Avanza', 'Kijang','Honda','Suzuki']),
            'model' => $this->faker->randomElement(['Pick-up', 'SUV','EV','MPV']),
            'warna' => $this->faker->colorName(),
        ];
    }
}
