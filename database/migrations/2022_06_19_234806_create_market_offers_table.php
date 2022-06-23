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
        $check = Schema::hasTable('market_offers') ? 'table' : 'create';

        Schema::$check('market_offers', function (Blueprint $table) {
            if (!Schema::hasColumn('market_offers', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('market_offers', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('market_offers', 'sale')) {
                $table->boolean('sale')->default(false);
            }
            if (!Schema::hasColumn('market_offers', 'itemtype')) {
                $table->unsignedInteger('itemtype');
            }
            if (!Schema::hasColumn('market_offers', 'amount')) {
                $table->unsignedSmallInteger('amount');
            }
            if (!Schema::hasColumn('market_offers', 'created')) {
                $table->unsignedBigInteger('created');
            }
            if (!Schema::hasColumn('market_offers', 'anonymous')) {
                $table->boolean('anonymous')->default(false);
            }
            if (!Schema::hasColumn('market_offers', 'price')) {
                $table->unsignedInteger('price')->default(0);
            }


            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("sale", $indexes)) {
                $table->index(['sale', 'itemtype'], 'sale');
            }

            if (!array_key_exists("created", $indexes)) {
                $table->index('created', 'created');
            }

            if (!array_key_exists("player_id", $indexes)) {
                $table->index('player_id', 'player_id');
            }
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
