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
        $check = Schema::hasTable('players_online') ? 'table' : 'create';

        Schema::$check('players_online', function (Blueprint $table) {
            if (!Schema::hasColumn('players_online', 'player_id')) {
                $table->integer('player_id')->primary();
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("primary", $indexes)) {
                $table->unique('player_id');
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
        Schema::dropIfExists('players_online');
    }
};
