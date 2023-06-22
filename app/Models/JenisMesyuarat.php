<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMesyuarat extends Model
{
    use HasFactory;

    const MESYUARAT_JPICT = 1;
    const MESYUARAT_JTICT = 2;

    protected $table = 'jenis_mesyuarat';

    public $timestamps = false;

    public function getNama()
    {
        return $this->nama . ' (' . $this->singkatan . ')';
    }
}
