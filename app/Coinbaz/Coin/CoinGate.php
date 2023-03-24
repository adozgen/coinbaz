<?php

namespace App\Coinbaz\Coin;

use App\Coinbaz\Coin\Action\Create;

class CoinGate
{
    public static function create($coins)
    {
        return (new Create($coins))->handle();
    }

}
