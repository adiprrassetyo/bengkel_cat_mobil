<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 3),
            'kategori_id' => mt_rand(1, 2),
            'slug' => $this->faker->word(),
            'excerpt' => $this->faker->sentence(20),
            'judul' => $this->faker->word(),
            'body' => $this->faker->sentence(50),
        ];
    }
}
