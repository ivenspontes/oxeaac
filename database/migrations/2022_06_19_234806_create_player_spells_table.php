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
        $check = Schema::hasTable('player_spells') ? 'table' : 'create';

        Schema::$check('player_spells', function (Blueprint $table) {
            if (!Schema::hasColumn('player_spells', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_spells', 'name')) {
                $table->string('name');
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
        Schema::dropIfExists('player_spells');
    }
};
