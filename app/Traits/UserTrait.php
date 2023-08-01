<?php

namespace App\Traits;

use App\Models\SSO_TPengguna;

trait UserTrait
{

    public function getName()
    {
        return ($this instanceof SSO_TPengguna) ? $this->pengguna_nama : $this->name;
    }

    public function getEmail()
    {
        //return $this->pengguna_emel?: 'No Email';    
        return ($this instanceof SSO_TPengguna) ? $this->pengguna_email : $this->email;
    }

    public function getBahagianName()
    {
        // return $this->kod_bahagian->bhg_nama;
        return ($this instanceof SSO_TPengguna) ? $this->kod_bahagian_bhg_nama : 'Undefined';
    }

    public function getRoleBadge()
    {

        $i = '';
        $badge = $this->getRoleNames();
        foreach($badge as $item){
            if($item == 'admin'){
                $i .= "<span class='badge rounded-pill bg-danger'>" . $item . "</span> ";    
            }else{
                $i .= "<span class='badge rounded-pill bg-success'>" . $item . "</span> ";
            }
            
        }

        return $i;
        
        // return $this->getRoleNames()->each(function ($item) {
        //     return "<span class='badge rounded-pill bg-success'>" . $item . "</span>";
        // });
        
    }
}
