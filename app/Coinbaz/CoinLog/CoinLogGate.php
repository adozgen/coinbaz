<?php

namespace App\Coinbaz\CoinLog;

use App\Coinbaz\CoinLog\Action\Create;

class CoinLogGate
{
    public static function create($coins)
    {
        return (new Create($coins))->handle();
    }

}
