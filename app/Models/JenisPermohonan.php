<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPermohonan extends Model
{
    use HasFactory;

    /**
     * Sebab kita x guna dia punya standard  
     */
    protected $table = 'jenis_permohonan';

    public $timestamps = false;
}
