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
        $check = Schema::hasTable('player_rewards') ? 'table' : 'create';

        Schema::$check('player_rewards', function (Blueprint $table) {
            if (!Schema::hasColumn('player_rewards', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_rewards', 'sid')) {
                $table->integer('sid');
            }
            if (!Schema::hasColumn('player_rewards', 'pid')) {
                $table->integer('pid')->default(0);
            }
            if (!Schema::hasColumn('player_rewards', 'itemtype')) {
                $table->integer('itemtype')->default(0);
            }
            if (!Schema::hasColumn('player_rewards', 'count')) {
                $table->integer('count')->default(0);
            }
            if (!Schema::hasColumn('player_rewards', 'attributes')) {
                $table->binary('attributes');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("player_rewards_unique", $indexes)) {
                $table->unique(['player_id', 'sid'], 'player_rewards_unique');
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
        Schema::dropIfExists('player_rewards');
    }
};
