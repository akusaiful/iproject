<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mesyuarat>
 */
class MesyuaratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bil' => rand(1,10),
            'tahun' => rand(2019,2023),
            'tarikh' => fake()->date(),
            'masa' => fake()->time(),
            'tempat' => fake()->state,
            'catatan' => fake()->text,
            'jenis_mesyuarat_id' => rand(1,2),
        ];
    }
}
