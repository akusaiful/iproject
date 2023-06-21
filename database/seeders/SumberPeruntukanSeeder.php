<?php

namespace Database\Seeders;

use App\Models\SumberPeruntukan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SumberPeruntukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SumberPeruntukan::truncate();

        SumberPeruntukan::insert([
            [
                'nama' => 'Peruntukan Mengurus'
            ],
            [
                'nama' => 'Peruntukan Pembangunan'
            ],
        ]);
    }
}
