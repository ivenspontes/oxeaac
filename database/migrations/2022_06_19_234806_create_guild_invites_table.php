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
        $check = Schema::hasTable('guild_invites') ? 'table' : 'create';

        Schema::$check('guild_invites', function (Blueprint $table) {
            if (!Schema::hasColumn('guild_invites', 'player_id')) {
                $table->integer('player_id')->default(0);
            }
            if (!Schema::hasColumn('guild_invites', 'guild_id')) {
                $table->integer('guild_id')->default(0);
            }
            if (!Schema::hasColumn('guild_invites', 'date')) {
                $table->integer('date');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("primary", $indexes)) {
                $table->primary(['player_id', 'guild_id']);
            }

            if (!array_key_exists("guild_id", $indexes)) {
                $table->index('guild_id', 'guild_id');
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
        Schema::dropIfExists('guild_invites');
    }
};
