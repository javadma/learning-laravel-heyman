<?php

namespace App\Loggers;


class Logger
{
    public function logGuestAccess()
    {
        \Log::info('some one want to sneak in');
    }

    public function longOperation()
    {
        \Log::info('some one want to sneak in' . time());
    }
}
