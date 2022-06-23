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
        $check = Schema::hasTable('player_taskhunt') ? 'table' : 'create';

        Schema::$check('player_taskhunt', function (Blueprint $table) {
            if (!Schema::hasColumn('player_taskhunt', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_taskhunt', 'slot')) {
                $table->boolean('slot');
            }
            if (!Schema::hasColumn('player_taskhunt', 'state')) {
                $table->boolean('state');
            }
            if (!Schema::hasColumn('player_taskhunt', 'raceid')) {
                $table->string('raceid', 250);
            }
            if (!Schema::hasColumn('player_taskhunt', 'upgrade')) {
                $table->boolean('upgrade');
            }
            if (!Schema::hasColumn('player_taskhunt', 'rarity')) {
                $table->boolean('rarity');
            }
            if (!Schema::hasColumn('player_taskhunt', 'kills')) {
                $table->string('kills', 250);
            }
            if (!Schema::hasColumn('player_taskhunt', 'disabled_time')) {
                $table->bigInteger('disabled_time');
            }
            if (!Schema::hasColumn('player_taskhunt', 'free_reroll')) {
                $table->bigInteger('free_reroll');
            }
            if (!Schema::hasColumn('player_taskhunt', 'monster_list')) {
                $table->binary('monster_list')->nullable();
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
        Schema::dropIfExists('player_taskhunt');
    }
};
