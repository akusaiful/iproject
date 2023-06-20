<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohon extends Model
{
    use HasFactory;

    protected $table = "mohon";

    protected $fillable = ['tajuk', 'tujuan', 'objektif', 'latar_belakang'];

}
