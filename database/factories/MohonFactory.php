<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mohon>
 */
class MohonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tajuk' => fake()->name,
            'tujuan' => fake()->catchPhrase,
            'latar_belakang' => fake()->text(),
            'objektif' => fake()->text(),
            'user_id' => rand(1,10),
            'jenis_permohonan_id' => rand(1,2),
            'kod_osol' => fake()->randomElement(['OS2800', 'P02-01105', 'SHOPEEE']),
            'kaedah_pembangunan_id' => rand(1,2),
            'sumber_peruntukan_id' => rand(1,2),
            'kaedah_perolehan_id' => rand(1,3)
        ];
    }
}
