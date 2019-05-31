<?php

namespace App\Http\Responses;


class Errors
{
    public function toWelComePage()
    {
        return redirect()->to('/welcome');
    }
}
