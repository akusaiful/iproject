<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSO_KodBahagian extends Model
{
    use HasFactory;

    protected $table = 'kod_bahagian';

    protected $primaryKey = 'bhg_id';

    protected $connection = 'sso_mysql';

}
