<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohon extends Model
{
    use HasFactory;

    protected $table = "mohon";

    /**
     * Field tambahan
     * 1. kaedah_pembangunan_id (Lookup)
     *      - Value : (In-house / Out-Source)
     *      - Model : KaedahPembangunan
     * 2. sumber_peruntukan_id (Lookup) 🤮 
     *      - Value : (Peruntukan Mengurus / Peruntukan Pembangunan / Kumpulan Wang Amanah / Tidak Berkaitan)
     *      - Model : SumberPeruntukan
     * 3. kod_osol 🤩
     * 4. kos 🤩
     * 5. kaedah_perolehan_id (Lookup) 🤮 
     *      - Value : (Sebut Harga / Tender / Rundingan Terus / Pembelian Terus / Tidak Berkaitan) 
     *      - Model : KaedahPerolehan
     * 5. jenis_permononan_id (Lookup) 🤩
     **/

    protected $fillable = [
        'tajuk', 'tujuan', 'objektif', 'latar_belakang', 'kod_osol',
        'kos', 'jenis_permohonan_id', 'user_id',
        'kaedah_pembangunan_id', 'sumber_peruntukan_id', 'kaedah_perolehan_id'
    ];

    /**
     * relation betwee 2 table
     */
    public function jenis_permohonan()
    {
        return $this->belongsTo(JenisPermohonan::class);
    }

    public function sumber_peruntukan()
    {
        return $this->belongsTo(SumberPeruntukan::class);
    }

    public function kaedah_perolehan()
    {
        return $this->belongsTo(KaedahPerolehan::class);
    }

    public function kaedah_pembangunan()
    {
        return $this->belongsTo(KaedahPembangunan::class);
    }
}
