<?php

namespace App\Coinbaz\CoinLog\Action;

use App\Coinbaz\CoinMarketCapApi;
use App\Events\CoinLogCreatedEvent;
use App\Filter\CoinHelper;
use App\Models\Coin;
use App\Models\CoinLog;
use App\Models\Threshold;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Create
{

    private array $coins;
    public function __construct($coins) {
         $this->coins = $coins;
    }

    public function handle()
    {
        $date = date('Y-m-d H:i:s', strtotime(Carbon::now()->format('Y-m-d')));

        $coinSymbols = array_map(fn($coin) => $coin['symbol'], $this->coins);

        $dbCoins = Coin::query()->whereIn('symbol', $coinSymbols)->where('last_updated', '>=', $date)->get();

        $thresholds = Threshold::query()->orderByDesc('value')->get();

        $logs = [];

        foreach ($dbCoins as $dbCoin) {
            $coinFilter = array_filter($this->coins, fn($coin) => $coin['symbol'] === $dbCoin->symbol);
            $coinFind = reset($coinFilter);
            foreach ($thresholds as $threshold) {
                try {
                    if (($coinFind['price'] - $dbCoin->price) !== 0 && $dbCoin->price !== 0){
                        $percentChange = (($coinFind['price'] - $dbCoin->price) / $dbCoin->price) * 100;
                        if (abs($percentChange) >= $threshold->value) {
                        $count = count(array_filter($logs, fn($log) => $log['percentage_change'] === $percentChange));
                        if ($count === 0) {
                            $logs[] = [
                                "coin_id" => $coinFind['id'],
                                'cmc_url' => CoinMarketCapApi::CMC_COIN_URL . Str::slug($dbCoin['name']),
                                "threshold_id" => $threshold->id,
                                "last_updated" => $coinFind['last_updated'],
                                "price" => $coinFind['price'],
                                "percentage_change" => $percentChange
                            ];
                        }
                    }
                    }
                } catch (\DivisionByZeroError $exception) {
                    continue;
                }
            }
        }

        CoinLog::query()->insert($logs);


        if (count($logs) > 0) {

            $lastId = CoinLog::query()->max('id');

            $coinLogsIds = range($lastId - count($logs) + 1, $lastId);

            event(new CoinLogCreatedEvent($coinLogsIds));
        }


        return count($logs);

    }

}
