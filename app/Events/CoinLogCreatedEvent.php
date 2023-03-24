<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CoinLogCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $coinLogsIds;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($coinLogsIds)
    {
        $this->coinLogsIds = $coinLogsIds;
    }

    public function getCoinLogsIds(){
        return $this->coinLogsIds;
    }
}
