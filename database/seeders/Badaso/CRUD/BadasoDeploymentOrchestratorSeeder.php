<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Traits\Seedable;

class BadasoDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/seeders/Badaso/CRUD/';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->seed(ThresholdsCRUDDataTypeAdded::class);
        $this->seed(ThresholdsCRUDDataRowAdded::class);
        $this->seed(CoinsCRUDDataTypeAdded::class);
        $this->seed(CoinsCRUDDataRowAdded::class);
        $this->seed(CoinLogsCRUDDataTypeAdded::class);
        $this->seed(CoinLogsCRUDDataRowAdded::class);
    }
}
