<?php

namespace Database\Seeders;

use App\Models\KaedahPerolehan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaedahPerolehanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KaedahPerolehan::truncate();

        KaedahPerolehan::insert([
            [
                'nama' => 'Sebut Harga'
            ],
            [
                'nama' => 'Tender'
            ],
            [
                'nama' => 'Rundingan Terus'
            ],
        ]);
        
    }
}
