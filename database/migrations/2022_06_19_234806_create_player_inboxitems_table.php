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
        $check = Schema::hasTable('player_inboxitems') ? 'table' : 'create';

        Schema::$check('player_inboxitems', function (Blueprint $table) {
            if (!Schema::hasColumn('player_inboxitems', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_inboxitems', 'sid')) {
                $table->integer('sid');
            }
            if (!Schema::hasColumn('player_inboxitems', 'pid')) {
                $table->integer('pid')->default(0);
            }
            if (!Schema::hasColumn('player_inboxitems', 'itemtype')) {
                $table->integer('itemtype')->default(0);
            }
            if (!Schema::hasColumn('player_inboxitems', 'count')) {
                $table->integer('count')->default(0);
            }
            if (!Schema::hasColumn('player_inboxitems', 'attributes')) {
                $table->binary('attributes');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("player_inboxitems_unique", $indexes)) {
                $table->unique(['player_id', 'sid'], 'player_inboxitems_unique');
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
        Schema::dropIfExists('player_inboxitems');
    }
};
