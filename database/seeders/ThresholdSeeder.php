<?php

namespace Database\Seeders;

use App\Models\Threshold;
use Illuminate\Database\Seeder;

class ThresholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thresholds = [
            ["value" => 10, "is_active" => true],
            ["value" => 20, "is_active" => true],
            ["value" => 30, "is_active" => true],
            ["value" => 40, "is_active" => true],
            ["value" => 50, "is_active" => true],
            ["value" => 60, "is_active" => true],
            ["value" => 70, "is_active" => true],
            ["value" => 80, "is_active" => true],
            ["value" => 90, "is_active" => true],
            ["value" => 100, "is_active" => true],
            ["value" => 200, "is_active" => true],
            ["value" => 300, "is_active" => true],
            ["value" => 400, "is_active" => true],
            ["value" => 500, "is_active" => true],
            ["value" => 600, "is_active" => true],
            ["value" => 700, "is_active" => true],
            ["value" => 800, "is_active" => true],
            ["value" => 900, "is_active" => true],
            ["value" => 1000, "is_active" => true]
        ];

        Threshold::query()->insertOrIgnore($thresholds);
    }
}
