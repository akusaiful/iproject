<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesyuarat extends Model
{
    use HasFactory;

    protected $table = 'mesyuarat';

    protected $fillable = ['bil', 'tahun', 'tarikh', 'tempat', 'masa', 'catatan', 'jenis_mesyuarat_id'];

    public function jenis_mesyuarat()
    {
        return $this->belongsTo(JenisMesyuarat::class);
    }
}
