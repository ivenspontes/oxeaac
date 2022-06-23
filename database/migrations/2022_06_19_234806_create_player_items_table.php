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
        $check = Schema::hasTable('player_items') ? 'table' : 'create';

        Schema::$check('player_items', function (Blueprint $table) {
            if (!Schema::hasColumn('player_items', 'player_id')) {
                $table->integer('player_id')->default(0);
            }
            if (!Schema::hasColumn('player_items', 'pid')) {
                $table->integer('pid')->default(0);
            }
            if (!Schema::hasColumn('player_items', 'sid')) {
                $table->integer('sid')->default(0);
            }
            if (!Schema::hasColumn('player_items', 'itemtype')) {
                $table->integer('itemtype')->default(0);
            }
            if (!Schema::hasColumn('player_items', 'count')) {
                $table->integer('count')->default(0);
            }
            if (!Schema::hasColumn('player_items', 'attributes')) {
                $table->binary('attributes');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("sid", $indexes)) {
                $table->index('sid', 'sid');
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
        Schema::dropIfExists('player_items');
    }
};
