<?php

namespace Database\Factories;

use App\Models\Mohon;
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
            'tajuk' => "Kertas Permohonan " . rand(1,1000), 
            'tujuan' => fake()->jpjNumberPlate(),
            'latar_belakang' => fake()->text(),
            'objektif' => fake()->text(),
            'user_id' => rand(1, 10),
            'jenis_permohonan_id' => rand(1, 2),
            'kod_osol' => fake()->randomElement(['OS2800', 'P02-01105', 'SHOPEEE']),
            'kaedah_pembangunan_id' => 2,
            'sumber_peruntukan_id' => rand(1, 2),
            'kaedah_perolehan_id' => rand(1, 3),
            'status_borang' => fake()->randomElement([Mohon::STATUS_BORANG_DRAFT, Mohon::STATUS_BORANG_SUBMIT]),
        ];
    }
}
