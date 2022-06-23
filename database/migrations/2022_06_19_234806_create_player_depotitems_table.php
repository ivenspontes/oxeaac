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
        $check = Schema::hasTable('player_depotitems') ? 'table' : 'create';

        Schema::$check('player_depotitems', function (Blueprint $table) {
            if (!Schema::hasColumn('player_depotitems', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_depotitems', 'sid')) {
                $table->integer('sid')->comment('any given range eg 0-100 will be reserved for depot lockers and all > 100 will be then normal items inside depots');
            }
            if (!Schema::hasColumn('player_depotitems', 'pid')) {
                $table->integer('pid')->default(0);
            }
            if (!Schema::hasColumn('player_depotitems', 'itemtype')) {
                $table->integer('itemtype')->default(0);
            }
            if (!Schema::hasColumn('player_depotitems', 'count')) {
                $table->integer('count')->default(0);
            }
            if (!Schema::hasColumn('player_depotitems', 'attributes')) {
                $table->binary('attributes');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("player_depotitems_unique", $indexes)) {
                $table->unique(['player_id', 'sid'], 'player_depotitems_unique');
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
        Schema::dropIfExists('player_depotitems');
    }
};
