<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perbaikan>
 */
class PerbaikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        return [
            'kendaraan_id' => mt_rand(1, 15),
            'kode_perbaikan' => Str::random(10),
            'judul_perbaikan' => $this->faker->word(),
            'keterangan' => $this->faker->sentence(10),
            'tanggal_masuk' => $this->faker->dateTime(),
            'tanggal_keluar' => $this->faker->date(),
            'biaya' => $this->faker->randomNumber(6, true),
            'status' => $this->faker->randomElement(['Baru Masuk', 'Pengerjaan','Menunggu Pembayaran','Selesai']),
        ];
    }
}
