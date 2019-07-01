<?php

namespace App\Acl;


class AccessControl
{
    public function beAdmin()
    {
        return function () {
            auth()->check() && auth()->user()->is_admin == true;
        }; 

    }
}
