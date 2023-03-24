<?php

namespace App\Console\Commands;

use App\Coinbaz\Coin\CoinGate;
use App\Coinbaz\CoinLog\CoinLogGate;
use App\Coinbaz\CoinMarketCapApi;
use App\Filter\CoinHelper;
use Illuminate\Console\Command;

class CoinProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */



    protected $signature = 'coin:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Coin analyzed for buy and sell';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $data = (new CoinMarketCapApi())->parameters()->handle();

        $coins = CoinHelper::filterCoins($data['data'], 'date_added');


        if(count($coins) === 0){
            $this->info('Sistemde yeni coin bulunamadı.');
            return 0;
        }


        $addedCoinsCount = CoinGate::create($coins);

        $this->info('Eklenen yeni coin sayısı: ' . $addedCoinsCount);

        $mappedCoins =  CoinHelper::map($coins);


        $addedCoinLogsCount = CoinLogGate::create($mappedCoins);

        $this->info('Eklenen yeni coin log sayısı: ' . $addedCoinLogsCount);


    }
}
