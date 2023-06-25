<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modelling table untuk SSO database and login authentication
 * 
 * Modification reference : https://gist.github.com/nuradiyana/900389ce25a71c2614c39aee80c9e99f
 */
class SSO_TPengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    use HasFactory;

    protected $table = 'tpengguna';

    protected $primaryKey = 'pengguna_id';

    protected $connection = 'sso_mysql';

    // protected $fillable = [       
    //     'password',
    // ];

    /**
     * Akses granted level
     */
    public function tlogin()
    {
        return $this->hasMany(SSO_TLogin::class, 'pengguna_id');        
    }

    /**
     * Bahagian related table
     */
    public function kod_bahagian()
    {
        return $this->belongsTo(SSO_KodBahagian::class, 'bhg_id');
    }

    /**
     * override method from Illuminate\Auth\Authenticatable trait.
     */
    public function getAuthPassword()
    {
        return bcrypt($this->pengguna_pass);
    }

    public function getName()
    {
        return $this->pengguna_nama;
    }

    public function getEmail()
    {
        return $this->pengguna_emel?: 'No Email';    
    }

    public function getBahagianName()
    {
        return $this->kod_bahagian->bhg_nama;
    
    }
       
}
