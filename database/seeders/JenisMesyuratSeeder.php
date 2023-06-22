<?php

namespace Database\Seeders;

use App\Models\JenisMesyuarat;
use App\Models\JenisPermohonan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisMesyuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisMesyuarat::truncate();
        JenisMesyuarat::insert([
            [
                'nama' => 'Mesyuarat JPICT',
                'singkatan' => 'JPICT'
            ],
            [
                'nama' => 'Mesyuarat JTICT',
                'singkatan' => 'JTICT'
            ]
        ]);
    }
}
