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
        $check = Schema::hasTable('guild_membership') ? 'table' : 'create';

        Schema::$check('guild_membership', function (Blueprint $table) {
            if (!Schema::hasColumn('guild_membership', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('guild_membership', 'guild_id')) {
                $table->integer('guild_id');
            }
            if (!Schema::hasColumn('guild_membership', 'rank_id')) {
                $table->integer('rank_id');
            }
            if (!Schema::hasColumn('guild_membership', 'nick')) {
                $table->string('nick', 15)->default('');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("guild_id", $indexes)) {
                $table->index('guild_id', 'guild_id');
            }

            if (!array_key_exists("rank_id", $indexes)) {
                $table->index('rank_id', 'rank_id');
            }

            if (!array_key_exists("primary", $indexes)) {
                $table->primary('player_id');
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
        Schema::dropIfExists('guild_membership');
    }
};
