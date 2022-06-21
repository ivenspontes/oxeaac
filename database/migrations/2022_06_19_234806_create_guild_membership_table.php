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
                $table->integer('player_id')->primary();
            }
            if (!Schema::hasColumn('guild_membership', 'guild_id')) {
                $table->integer('guild_id')->index('guild_id');
            }
            if (!Schema::hasColumn('guild_membership', 'rank_id')) {
                $table->integer('rank_id')->index('rank_id');
            }
            if (!Schema::hasColumn('guild_membership', 'nick')) {
                $table->string('nick', 15)->default('');
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
