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
        $check = Schema::hasTable('player_charms') ? 'table' : 'create';

        Schema::$check('player_charms', function (Blueprint $table) {
            if (!Schema::hasColumn('player_charms', 'player_guid')) {
                $table->integer('player_guid');
            }
            if (!Schema::hasColumn('player_charms', 'charm_points')) {
                $table->string('charm_points', 250)->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'charm_expansion')) {
                $table->boolean('charm_expansion')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_wound')) {
                $table->integer('rune_wound')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_enflame')) {
                $table->integer('rune_enflame')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_poison')) {
                $table->integer('rune_poison')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_freeze')) {
                $table->integer('rune_freeze')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_zap')) {
                $table->integer('rune_zap')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_curse')) {
                $table->integer('rune_curse')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_cripple')) {
                $table->integer('rune_cripple')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_parry')) {
                $table->integer('rune_parry')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_dodge')) {
                $table->integer('rune_dodge')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_adrenaline')) {
                $table->integer('rune_adrenaline')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_numb')) {
                $table->integer('rune_numb')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_cleanse')) {
                $table->integer('rune_cleanse')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_bless')) {
                $table->integer('rune_bless')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_scavenge')) {
                $table->integer('rune_scavenge')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_gut')) {
                $table->integer('rune_gut')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_low_blow')) {
                $table->integer('rune_low_blow')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_divine')) {
                $table->integer('rune_divine')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_vamp')) {
                $table->integer('rune_vamp')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'rune_void')) {
                $table->integer('rune_void')->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'UsedRunesBit')) {
                $table->string('UsedRunesBit', 250)->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'UnlockedRunesBit')) {
                $table->string('UnlockedRunesBit', 250)->nullable();
            }
            if (!Schema::hasColumn('player_charms', 'tracker list')) {
                $table->binary('tracker list')->nullable();
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
        Schema::dropIfExists('player_charms');
    }
};
