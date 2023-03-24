<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('cmc_url')->nullable();
            $table->string('symbol')->nullable();
            $table->string('slug')->nullable();
            $table->timestamp('date_added')->nullable();
            $table->string('platform_name')->nullable();
            $table->string('platform_symbol')->nullable();
            $table->string('platform_slug')->nullable();
            $table->string('token_address')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->decimal('price', 20, 17)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('symbol');
            $table->index('token_address');
            $table->index('platform_symbol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins');
    }
}
