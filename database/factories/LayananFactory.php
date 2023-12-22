<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profil_bengkel_id' => 1,
            'judul' => $this->faker->word(),
            'keterangan' => $this->faker->sentence(40),
            'harga' => $this->faker->randomNumber(6, true),
        ];
    }
}
