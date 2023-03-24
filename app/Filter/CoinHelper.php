<?php

namespace App\Filter;

use App\Coinbaz\CoinMarketCapApi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CoinHelper
{
    public static function filterCoins($coins, $field): array
    {
        $date = Carbon::yesterday()->format('Y-m-d');
        return array_filter($coins, function($coin) use ($date, $field) {
            $coinDate = date('Y-m-d', strtotime($coin[$field]));
            return $coinDate >= $date;
        });
    }

    public static function map($data): array
    {
        $result = [];
        foreach ($data as $item) {
            $platform = $item['platform'];
            $result[] = [
                'id' => $item['id'],
                'cmc_url' => CoinMarketCapApi::CMC_COIN_URL . Str::slug($item['name']),
                'name' => $item['name'],
                'symbol' => $item['symbol'],
                'slug' => $item['slug'],
                'date_added' => Carbon::parse($item['date_added'])->tz('Europe/Istanbul')->format('Y-m-d H:i:s'),
                'platform_name' => $platform ? $platform['name'] : null,
                'platform_symbol' => $platform ? $platform['symbol'] : null,
                'platform_slug' => $platform ? $platform['slug'] : null,
                'token_address' => $platform ? $platform['token_address'] : null,
                'last_updated' => Carbon::parse($item['last_updated'])->tz('Europe/Istanbul')->format('Y-m-d H:i:s'),
                'price' => $item['quote']['USD']['price']
            ];
        }
        return $result;
    }

}
