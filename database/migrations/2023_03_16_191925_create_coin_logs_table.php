<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_logs', function (Blueprint $table) {
            $table->id();
            $table->string('cmc_url')->nullable();
            $table->unsignedBigInteger('coin_id')->nullable();
            $table->unsignedBigInteger('threshold_id')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->decimal('price', 20, 17)->nullable();
            $table->decimal('percentage_change', 10, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index("coin_id");
            $table->index("threshold_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_logs');
    }
}
