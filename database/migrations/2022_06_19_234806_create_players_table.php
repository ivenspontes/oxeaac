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
        Schema::create('players', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->unique('players_unique');
            $table->integer('group_id')->default(1);
            $table->unsignedInteger('account_id')->default(0)->index('account_id');
            $table->integer('level')->default(1);
            $table->integer('vocation')->default(0)->index('vocation');
            $table->integer('health')->default(150);
            $table->integer('healthmax')->default(150);
            $table->bigInteger('experience')->default(0);
            $table->integer('lookbody')->default(0);
            $table->integer('lookfeet')->default(0);
            $table->integer('lookhead')->default(0);
            $table->integer('looklegs')->default(0);
            $table->integer('looktype')->default(136);
            $table->integer('lookaddons')->default(0);
            $table->integer('maglevel')->default(0);
            $table->integer('mana')->default(0);
            $table->integer('manamax')->default(0);
            $table->unsignedBigInteger('manaspent')->default(0);
            $table->unsignedInteger('soul')->default(0);
            $table->integer('town_id')->default(1);
            $table->integer('posx')->default(0);
            $table->integer('posy')->default(0);
            $table->integer('posz')->default(0);
            $table->binary('conditions');
            $table->integer('cap')->default(0);
            $table->integer('sex')->default(0);
            $table->unsignedBigInteger('lastlogin')->default(0);
            $table->unsignedInteger('lastip')->default(0);
            $table->boolean('save')->default(true);
            $table->boolean('skull')->default(false);
            $table->bigInteger('skulltime')->default(0);
            $table->unsignedBigInteger('lastlogout')->default(0);
            $table->tinyInteger('blessings')->default(0);
            $table->tinyInteger('blessings1')->default(0);
            $table->tinyInteger('blessings2')->default(0);
            $table->tinyInteger('blessings3')->default(0);
            $table->tinyInteger('blessings4')->default(0);
            $table->tinyInteger('blessings5')->default(0);
            $table->tinyInteger('blessings6')->default(0);
            $table->tinyInteger('blessings7')->default(0);
            $table->tinyInteger('blessings8')->default(0);
            $table->integer('onlinetime')->default(0);
            $table->bigInteger('deletion')->default(0);
            $table->unsignedBigInteger('balance')->default(0);
            $table->unsignedSmallInteger('offlinetraining_time')->default(43200);
            $table->integer('offlinetraining_skill')->default(-1);
            $table->unsignedSmallInteger('stamina')->default(2520);
            $table->unsignedInteger('skill_fist')->default(10);
            $table->unsignedBigInteger('skill_fist_tries')->default(0);
            $table->unsignedInteger('skill_club')->default(10);
            $table->unsignedBigInteger('skill_club_tries')->default(0);
            $table->unsignedInteger('skill_sword')->default(10);
            $table->unsignedBigInteger('skill_sword_tries')->default(0);
            $table->unsignedInteger('skill_axe')->default(10);
            $table->unsignedBigInteger('skill_axe_tries')->default(0);
            $table->unsignedInteger('skill_dist')->default(10);
            $table->unsignedBigInteger('skill_dist_tries')->default(0);
            $table->unsignedInteger('skill_shielding')->default(10);
            $table->unsignedBigInteger('skill_shielding_tries')->default(0);
            $table->unsignedInteger('skill_fishing')->default(10);
            $table->unsignedBigInteger('skill_fishing_tries')->default(0);
            $table->unsignedInteger('skill_critical_hit_chance')->default(0);
            $table->unsignedBigInteger('skill_critical_hit_chance_tries')->default(0);
            $table->unsignedInteger('skill_critical_hit_damage')->default(0);
            $table->unsignedBigInteger('skill_critical_hit_damage_tries')->default(0);
            $table->unsignedInteger('skill_life_leech_chance')->default(0);
            $table->unsignedBigInteger('skill_life_leech_chance_tries')->default(0);
            $table->unsignedInteger('skill_life_leech_amount')->default(0);
            $table->unsignedBigInteger('skill_life_leech_amount_tries')->default(0);
            $table->unsignedInteger('skill_mana_leech_chance')->default(0);
            $table->unsignedBigInteger('skill_mana_leech_chance_tries')->default(0);
            $table->unsignedInteger('skill_mana_leech_amount')->default(0);
            $table->unsignedBigInteger('skill_mana_leech_amount_tries')->default(0);
            $table->unsignedBigInteger('skill_criticalhit_chance')->default(0);
            $table->unsignedBigInteger('skill_criticalhit_damage')->default(0);
            $table->unsignedBigInteger('skill_lifeleech_chance')->default(0);
            $table->unsignedBigInteger('skill_lifeleech_amount')->default(0);
            $table->unsignedBigInteger('skill_manaleech_chance')->default(0);
            $table->unsignedBigInteger('skill_manaleech_amount')->default(0);
            $table->unsignedSmallInteger('manashield')->default(0);
            $table->unsignedSmallInteger('max_manashield')->default(0);
            $table->smallInteger('xpboost_stamina')->nullable();
            $table->tinyInteger('xpboost_value')->nullable();
            $table->unsignedBigInteger('marriage_status')->default(0);
            $table->integer('marriage_spouse')->default(-1);
            $table->bigInteger('bonus_rerolls')->default(0);
            $table->bigInteger('prey_wildcard')->default(0);
            $table->bigInteger('task_points')->default(0);
            $table->boolean('quickloot_fallback')->nullable()->default(false);
            $table->unsignedTinyInteger('lookmountbody')->default(0);
            $table->unsignedTinyInteger('lookmountfeet')->default(0);
            $table->unsignedTinyInteger('lookmounthead')->default(0);
            $table->unsignedTinyInteger('lookmountlegs')->default(0);
            $table->unsignedInteger('lookfamiliarstype')->default(0);
            $table->boolean('isreward')->default(true);
            $table->boolean('istutorial')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
