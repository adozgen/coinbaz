<?php

namespace App\Listeners;

use App\Events\CoinLogCreatedEvent;
use App\Models\CoinLog;
use App\Notifications\CoinLogPublished;
use App\Notifications\CoinPublished;

class CoinLogCreatedListener
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
     * @param  CoinLogCreatedEvent  $event
     * @return void
     */
    public function handle(CoinLogCreatedEvent $event)
    {
        $coinLogs = CoinLog::query()->whereIn('id', $event->getCoinLogsIds())->with('coin')->get();
        foreach ($coinLogs as $coinLog) {
            $coinLog->notify(new CoinLogPublished(self::content($coinLog)));
        }
    }

    private static function content($coinLog): string
    {
        $coinAddress = ' Contract Adresi: ' . $coinLog->coin->token_address;
        $coinName = ' Adı: ' . $coinLog->coin->name;
        $coinSymbol = ' Symbol: ' . $coinLog->coin->symbol;
        $platformName = ' Platform: ' . $coinLog->coin->platform_name;
        $cmcUrl = ' CMC: ' . $coinLog->cmc_url;

        $lastUpdatedDate = ' Son Güncellenme Tarihi: ' . $coinLog->last_updated;
        $percentageChange = 'Yüzde Değişimi: ' . $coinLog->percentage_change . '%';

        return $percentageChange . $coinAddress . $coinName . $coinSymbol . $platformName . $lastUpdatedDate . $cmcUrl;

    }
}
