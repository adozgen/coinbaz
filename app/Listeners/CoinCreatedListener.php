<?php

namespace App\Listeners;

use App\Events\CoinCreatedEvent;
use App\Models\Coin;
use App\Notifications\CoinPublished;

class CoinCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CoinCreatedEvent  $event
     * @return void
     */
    public function handle(CoinCreatedEvent $event)
    {
        $coins = Coin::query()->whereIn('id', $event->getCoinIds())->get();
        foreach ($coins as $coin) {
            $coin->notify(new CoinPublished(self::content($coin)));
        }
    }

    private static function content($coin): string
    {
        $coinAddress = ' Contract Adresi: ' . $coin->token_address;
        $coinName = ' Adı: ' . $coin->name;
        $coinSymbol = ' Symbol: ' . $coin->symbol;
        $platformName = ' Platform: ' . $coin->platform_name;
        $cmcUrl = ' CMC: ' . $coin->cmc_url;

        $addedDate = 'Eklenme Tarihi: ' . $coin->date_added;

        return $addedDate . $coinAddress . $coinName . $coinSymbol . $platformName . $cmcUrl;

    }
}
