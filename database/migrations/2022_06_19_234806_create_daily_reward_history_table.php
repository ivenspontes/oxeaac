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
        $check = Schema::hasTable('daily_reward_history') ? 'table' : 'create';

        Schema::$check('daily_reward_history', function (Blueprint $table) {
            if (!Schema::hasColumn('daily_reward_history', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('daily_reward_history', 'daystreak')) {
                $table->smallInteger('daystreak')->default(0);
            }
            if (!Schema::hasColumn('daily_reward_history', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('daily_reward_history', 'timestamp')) {
                $table->integer('timestamp');
            }
            if (!Schema::hasColumn('daily_reward_history', 'description')) {
                $table->string('description')->nullable();
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

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
        Schema::dropIfExists('daily_reward_history');
    }
};
