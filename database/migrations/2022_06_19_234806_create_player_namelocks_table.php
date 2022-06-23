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
        $check = Schema::hasTable('player_namelocks') ? 'table' : 'create';

        Schema::$check('player_namelocks', function (Blueprint $table) {
            if (!Schema::hasColumn('player_namelocks', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_namelocks', 'reason')) {
                $table->string('reason');
            }
            if (!Schema::hasColumn('player_namelocks', 'namelocked_at')) {
                $table->bigInteger('namelocked_at');
            }
            if (!Schema::hasColumn('player_namelocks', 'namelocked_by')) {
                $table->integer('namelocked_by');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("player_namelocks_unique", $indexes)) {
                $table->unique('player_id', 'player_namelocks_unique');
            }

            if (!array_key_exists("namelocked_by", $indexes)) {
                $table->index('namelocked_by', 'namelocked_by');
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
        Schema::dropIfExists('player_namelocks');
    }
};
