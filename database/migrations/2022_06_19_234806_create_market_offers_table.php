<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_offers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('player_id')->index('player_id');
            $table->boolean('sale')->default(false);
            $table->unsignedInteger('itemtype');
            $table->unsignedSmallInteger('amount');
            $table->unsignedBigInteger('created')->index('created');
            $table->boolean('anonymous')->default(false);
            $table->unsignedInteger('price')->default(0);

            $table->index(['sale', 'itemtype'], 'sale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_offers');
    }
};
