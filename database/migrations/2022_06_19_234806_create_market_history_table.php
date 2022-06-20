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
        Schema::create('market_history', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('player_id');
            $table->boolean('sale')->default(false);
            $table->unsignedInteger('itemtype');
            $table->unsignedSmallInteger('amount');
            $table->unsignedInteger('price')->default(0);
            $table->unsignedBigInteger('expires_at');
            $table->unsignedBigInteger('inserted');
            $table->unsignedTinyInteger('state');

            $table->index(['player_id', 'sale'], 'player_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_history');
    }
};
