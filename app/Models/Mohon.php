<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Mohon extends Model
{
    use HasFactory;

    const STATUS_BORANG_DRAFT = 'DRAFT';
    const STATUS_BORANG_SUBMIT = 'SUBMIT';

    const DOCUMENT_FOLDER = 'document';

    public $status_borang_draft = 'DRAFT';

    /**
     * Current file
     */
    public $tmpFile = [];


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
        'kaedah_pembangunan_id', 'sumber_peruntukan_id', 'kaedah_perolehan_id',
        'status_borang'
    ];

    protected static function booted()
    {
        static::created(function ($mohon) {
            $mohon->tmpFile['file_dokumen_proses_semasa'] = $mohon->file_dokumen_proses_semasa;
        });
    }

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

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function kaedah_pembangunan()
    {
        return $this->belongsTo(KaedahPembangunan::class);
    }

    public function scopeOwner($query)
    {
        return $query->where('user_id', Auth::id());
    }

    public function scopeFilter($query)
    {
        $queryText = request()->get('query');
        $query->where('tajuk', 'like', "%$queryText%")
            ->orWhere('tujuan', 'like', "%$queryText%")
            ->orWhere('objektif', 'like', "%$queryText%")
            ->orWhere('latar_belakang', 'like', "%$queryText%")

            ->orWhereHas('jenis_permohonan', function ($queryBuilder) use ($queryText) {
                $queryBuilder->where('nama', 'like', "%$queryText%");
            })

            ->orWhereHas('sumber_peruntukan', function ($queryBuilder) use ($queryText) {
                $queryBuilder->where('nama', 'like', "%$queryText%");
            })

            ->orWhereHas('kaedah_perolehan', function ($queryBuilder) use ($queryText) {
                $queryBuilder->where('nama', 'like', "%$queryText%");
            })

            ->orWhereHas('kaedah_pembangunan', function ($queryBuilder) use ($queryText) {
                $queryBuilder->where('nama', 'like', "%$queryText%");
            });

        return $query;
    }

    /**
     * Get File link
     */
    public function getFileLink()
    {
        if ($this->checkFileExist()) {
            return route('file.download', [
                'model' => $this
            ]);
        }
    }

    /**
     * Check file exist
     */
    public function checkFileExist()
    {
        if (
            $this->file_dokumen_proses_semasa &&
            Storage::exists(self::DOCUMENT_FOLDER . '/' . $this->file_dokumen_proses_semasa)
        ) {
            return true;
        }
        return false;
    }
}
