<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [ 
            // 'nik' =>$this->faker->nik(),
            'id_user' => Str::random(10),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'no_telp' => $this->faker->phoneNumber(),
            'role' => $this->faker->randomElement(['admin', 'user','owner']),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->freeEmail(),
            'password' => $this->faker->password(8),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
