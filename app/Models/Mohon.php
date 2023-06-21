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
     * 2. sumber_peruntukan_id (Lookup)
     * 3. kod_osol
     * 4. kos
     * 5. kaedah_perolehan_id (Lookup) 
     * 5. jenis_permononan_id (Lookup)
     **/

    protected $fillable = ['tajuk', 'tujuan', 'objektif', 'latar_belakang', 'kod_osol', 'kos', 'jenis_permohonan_id', 'user_id'];

    /**
     * relation betwee 2 table
     */
    public function jenis_permohonan()
    {
        return $this->belongsTo(JenisPermohonan::class);
    }
}
