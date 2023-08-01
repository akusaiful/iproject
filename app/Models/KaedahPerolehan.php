<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaedahPerolehan extends Model
{
    use HasFactory;

    protected $table = 'kaedah_perolehan';

    protected $fillable = ['nama'];

    public $timestamps = false;

    public function permohonan()
    {
        return $this->hasMany(Mohon::class);
    }

}
