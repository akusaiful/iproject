<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisPermohonan;
use App\Models\KaedahPembangunan;
use App\Models\KaedahPerolehan;
use App\Models\Mohon;
use App\Models\SumberPeruntukan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // clerkan data
        // Mohon::truncate();
        // User::truncate();
        
        //DB::truncate('mohon');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call(JenisPermohonanSeeder::class);
        $this->call(KaedahPembangunanSeeder::class);
        $this->call(SumberPeruntukanSeeder::class);
        $this->call(KaedahPerolehanSeeder::class);
        $this->call(JenisMesyuratSeeder::class);

        \App\Models\User::factory(10)->create();
        \App\Models\Mohon::factory(100)->create();
        \App\Models\Mesyuarat::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
