<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSO_KodLevel extends Model
{
    use HasFactory;

    protected $table = 'kod_level';

    protected $primaryKey = 'level_kod';

    protected $connection = 'sso_mysql';

}
