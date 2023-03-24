<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Notifications\CoinPublished;
use Illuminate\Console\Command;

class TelegramNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:notify {--v1=} {--v2=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $result = (($this->option('v2') - $this->option('v1')) / $this->option('v1')) * 100;
        dd($result);
    }
}
