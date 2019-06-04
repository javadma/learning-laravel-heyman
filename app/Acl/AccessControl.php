<?php

namespace App\Acl;


class AccessControl
{
    public function beAdmin()
    {
        return auth()->check() && auth()->user()->is_admin == true;
    }
}
