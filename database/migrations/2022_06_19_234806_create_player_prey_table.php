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
        $check = Schema::hasTable('player_prey') ? 'table' : 'create';

        Schema::$check('player_prey', function (Blueprint $table) {
            if (!Schema::hasColumn('player_prey', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_prey', 'slot')) {
                $table->boolean('slot');
            }
            if (!Schema::hasColumn('player_prey', 'state')) {
                $table->boolean('state');
            }
            if (!Schema::hasColumn('player_prey', 'raceid')) {
                $table->string('raceid', 250);
            }
            if (!Schema::hasColumn('player_prey', 'option')) {
                $table->boolean('option');
            }
            if (!Schema::hasColumn('player_prey', 'bonus_type')) {
                $table->boolean('bonus_type');
            }
            if (!Schema::hasColumn('player_prey', 'bonus_rarity')) {
                $table->boolean('bonus_rarity');
            }
            if (!Schema::hasColumn('player_prey', 'bonus_percentage')) {
                $table->string('bonus_percentage', 250);
            }
            if (!Schema::hasColumn('player_prey', 'bonus_time')) {
                $table->string('bonus_time', 250);
            }
            if (!Schema::hasColumn('player_prey', 'free_reroll')) {
                $table->bigInteger('free_reroll');
            }
            if (!Schema::hasColumn('player_prey', 'monster_list')) {
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
        Schema::dropIfExists('player_prey');
    }
};
