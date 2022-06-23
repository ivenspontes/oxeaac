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
        $check = Schema::hasTable('market_history') ? 'table' : 'create';

        Schema::$check('market_history', function (Blueprint $table) {
            if (!Schema::hasColumn('market_history', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('market_history', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('market_history', 'sale')) {
                $table->boolean('sale')->default(false);
            }
            if (!Schema::hasColumn('market_history', 'itemtype')) {
                $table->unsignedInteger('itemtype');
            }
            if (!Schema::hasColumn('market_history', 'amount')) {
                $table->unsignedSmallInteger('amount');
            }
            if (!Schema::hasColumn('market_history', 'price')) {
                $table->unsignedInteger('price')->default(0);
            }
            if (!Schema::hasColumn('market_history', 'expires_at')) {
                $table->unsignedBigInteger('expires_at');
            }
            if (!Schema::hasColumn('market_history', 'inserted')) {
                $table->unsignedBigInteger('inserted');
            }
            if (!Schema::hasColumn('market_history', 'state')) {
                $table->unsignedTinyInteger('state');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("player_id", $indexes)) {
                $table->index(['player_id', 'sale'], 'player_id');
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
        Schema::dropIfExists('market_history');
    }
};
