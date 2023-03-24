<?php

namespace App\Coinbaz\Coin\Action;

use App\Events\CoinCreatedEvent;
use App\Filter\CoinHelper;
use App\Models\Coin;

class Create
{

    private array $coins;
    public function __construct($coins) {
         $this->coins = $coins;
    }

    public function handle()
    {
        $coinSymbols = array_map(fn($coin) => $coin['symbol'], $this->coins);

        $dbCoinsSymbols = Coin::query()->whereIn('symbol', $coinSymbols)->pluck('symbol')->all();

        $diffSymbols = array_diff($coinSymbols, $dbCoinsSymbols);

        $coins = array_filter($this->coins, function($coin) use ($diffSymbols) {
            return in_array($coin['symbol'], $diffSymbols);
        });

        $mappedCoins = CoinHelper::map($coins);


        Coin::query()->insert($mappedCoins);

        if (count($mappedCoins) > 0) {

            $lastId = Coin::query()->max('id');

            $coinIds = range($lastId - count($mappedCoins) + 1, $lastId);

            event(new CoinCreatedEvent($coinIds));
        }

        return count($mappedCoins);

    }

}
