<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSO_TLogin extends Model
{
    use HasFactory;

    protected $table = 'tlogin';

    protected $primaryKey = 'login_id';

    protected $connection = 'sso_mysql';

    /**
     * Get kod level
     */
    public function kod_level()
    {
        return $this->belongsTo(SSO_KodLevel::class,'level_id', 'level_id')->where('sistem_id', 45);
    }
}
