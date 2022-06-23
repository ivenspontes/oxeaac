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
        $check = Schema::hasTable('player_deaths') ? 'table' : 'create';

        Schema::$check('player_deaths', function (Blueprint $table) {
            if (!Schema::hasColumn('player_deaths', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_deaths', 'time')) {
                $table->unsignedBigInteger('time')->default(0);
            }
            if (!Schema::hasColumn('player_deaths', 'level')) {
                $table->integer('level')->default(1);
            }
            if (!Schema::hasColumn('player_deaths', 'killed_by')) {
                $table->string('killed_by');
            }
            if (!Schema::hasColumn('player_deaths', 'is_player')) {
                $table->boolean('is_player')->default(true);
            }
            if (!Schema::hasColumn('player_deaths', 'mostdamage_by')) {
                $table->string('mostdamage_by', 100);
            }
            if (!Schema::hasColumn('player_deaths', 'mostdamage_is_player')) {
                $table->boolean('mostdamage_is_player')->default(false);
            }
            if (!Schema::hasColumn('player_deaths', 'unjustified')) {
                $table->boolean('unjustified')->default(false);
            }
            if (!Schema::hasColumn('player_deaths', 'mostdamage_unjustified')) {
                $table->boolean('mostdamage_unjustified')->default(false);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("mostdamage_by", $indexes)) {
                $table->index('mostdamage_by', 'mostdamage_by');
            }

            if (!array_key_exists("killed_by", $indexes)) {
                $table->index('killed_by', 'killed_by');
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
        Schema::dropIfExists('player_deaths');
    }
};
