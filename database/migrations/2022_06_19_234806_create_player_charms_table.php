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
        Schema::create('player_charms', function (Blueprint $table) {
            $table->integer('player_guid');
            $table->string('charm_points', 250)->nullable();
            $table->boolean('charm_expansion')->nullable();
            $table->integer('rune_wound')->nullable();
            $table->integer('rune_enflame')->nullable();
            $table->integer('rune_poison')->nullable();
            $table->integer('rune_freeze')->nullable();
            $table->integer('rune_zap')->nullable();
            $table->integer('rune_curse')->nullable();
            $table->integer('rune_cripple')->nullable();
            $table->integer('rune_parry')->nullable();
            $table->integer('rune_dodge')->nullable();
            $table->integer('rune_adrenaline')->nullable();
            $table->integer('rune_numb')->nullable();
            $table->integer('rune_cleanse')->nullable();
            $table->integer('rune_bless')->nullable();
            $table->integer('rune_scavenge')->nullable();
            $table->integer('rune_gut')->nullable();
            $table->integer('rune_low_blow')->nullable();
            $table->integer('rune_divine')->nullable();
            $table->integer('rune_vamp')->nullable();
            $table->integer('rune_void')->nullable();
            $table->string('UsedRunesBit', 250)->nullable();
            $table->string('UnlockedRunesBit', 250)->nullable();
            $table->binary('tracker list')->nullable();
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
