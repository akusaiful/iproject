<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberPeruntukan extends Model
{
    use HasFactory;

    protected $table = 'sumber_peruntukan';

    protected $fillable = ['nama'];

    public $timestamps = false;

    public function permohonan()
    {
        return $this->hasMany(Mohon::class);
    }
}
