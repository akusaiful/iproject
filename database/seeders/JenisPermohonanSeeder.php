<?php

namespace Database\Seeders;

use App\Models\JenisPermohonan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPermohonan::truncate();

        JenisPermohonan::insert([
            [
                'nama' => 'Pembangunan'
            ],
            [
                'nama' => 'Peralatan'
            ],
        ]);
    }
}
