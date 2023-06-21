<?php

namespace Database\Seeders;

use App\Models\KaedahPembangunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaedahPembangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KaedahPembangunan::truncate();

        KaedahPembangunan::insert([
            [
                'nama' => 'In-House'
            ],
            [
                'nama' => 'Out-Source'
            ],
        ]);
    }
}
