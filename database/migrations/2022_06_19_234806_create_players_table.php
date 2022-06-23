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
        $check = Schema::hasTable('players') ? 'table' : 'create';

        Schema::$check('players', function (Blueprint $table) {
            if (!Schema::hasColumn('players', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('players', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('players', 'group_id')) {
                $table->integer('group_id')->default(1);
            }
            if (!Schema::hasColumn('players', 'account_id')) {
                $table->unsignedInteger('account_id')->default(0);
            }
            if (!Schema::hasColumn('players', 'level')) {
                $table->integer('level')->default(1);
            }
            if (!Schema::hasColumn('players', 'vocation')) {
                $table->integer('vocation')->default(0);
            }
            if (!Schema::hasColumn('players', 'health')) {
                $table->integer('health')->default(150);
            }
            if (!Schema::hasColumn('players', 'healthmax')) {
                $table->integer('healthmax')->default(150);
            }
            if (!Schema::hasColumn('players', 'experience')) {
                $table->bigInteger('experience')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookbody')) {
                $table->integer('lookbody')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookfeet')) {
                $table->integer('lookfeet')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookhead')) {
                $table->integer('lookhead')->default(0);
            }
            if (!Schema::hasColumn('players', 'looklegs')) {
                $table->integer('looklegs')->default(0);
            }
            if (!Schema::hasColumn('players', 'looktype')) {
                $table->integer('looktype')->default(136);
            }
            if (!Schema::hasColumn('players', 'lookaddons')) {
                $table->integer('lookaddons')->default(0);
            }
            if (!Schema::hasColumn('players', 'maglevel')) {
                $table->integer('maglevel')->default(0);
            }
            if (!Schema::hasColumn('players', 'mana')) {
                $table->integer('mana')->default(0);
            }
            if (!Schema::hasColumn('players', 'manamax')) {
                $table->integer('manamax')->default(0);
            }
            if (!Schema::hasColumn('players', 'manaspent')) {
                $table->unsignedBigInteger('manaspent')->default(0);
            }
            if (!Schema::hasColumn('players', 'soul')) {
                $table->unsignedInteger('soul')->default(0);
            }
            if (!Schema::hasColumn('players', 'town_id')) {
                $table->integer('town_id')->default(1);
            }
            if (!Schema::hasColumn('players', 'posx')) {
                $table->integer('posx')->default(0);
            }
            if (!Schema::hasColumn('players', 'posy')) {
                $table->integer('posy')->default(0);
            }
            if (!Schema::hasColumn('players', 'posz')) {
                $table->integer('posz')->default(0);
            }
            if (!Schema::hasColumn('players', 'conditions')) {
                $table->binary('conditions');
            }
            if (!Schema::hasColumn('players', 'cap')) {
                $table->integer('cap')->default(0);
            }
            if (!Schema::hasColumn('players', 'sex')) {
                $table->integer('sex')->default(0);
            }
            if (!Schema::hasColumn('players', 'lastlogin')) {
                $table->unsignedBigInteger('lastlogin')->default(0);
            }
            if (!Schema::hasColumn('players', 'lastip')) {
                $table->unsignedInteger('lastip')->default(0);
            }
            if (!Schema::hasColumn('players', 'save')) {
                $table->boolean('save')->default(true);
            }
            if (!Schema::hasColumn('players', 'skull')) {
                $table->boolean('skull')->default(false);
            }
            if (!Schema::hasColumn('players', 'skulltime')) {
                $table->bigInteger('skulltime')->default(0);
            }
            if (!Schema::hasColumn('players', 'lastlogout')) {
                $table->unsignedBigInteger('lastlogout')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings')) {
                $table->tinyInteger('blessings')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings1')) {
                $table->tinyInteger('blessings1')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings2')) {
                $table->tinyInteger('blessings2')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings3')) {
                $table->tinyInteger('blessings3')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings4')) {
                $table->tinyInteger('blessings4')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings5')) {
                $table->tinyInteger('blessings5')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings6')) {
                $table->tinyInteger('blessings6')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings7')) {
                $table->tinyInteger('blessings7')->default(0);
            }
            if (!Schema::hasColumn('players', 'blessings8')) {
                $table->tinyInteger('blessings8')->default(0);
            }
            if (!Schema::hasColumn('players', 'onlinetime')) {
                $table->integer('onlinetime')->default(0);
            }
            if (!Schema::hasColumn('players', 'deletion')) {
                $table->bigInteger('deletion')->default(0);
            }
            if (!Schema::hasColumn('players', 'balance')) {
                $table->unsignedBigInteger('balance')->default(0);
            }
            if (!Schema::hasColumn('players', 'offlinetraining_time')) {
                $table->unsignedSmallInteger('offlinetraining_time')->default(43200);
            }
            if (!Schema::hasColumn('players', 'offlinetraining_skill')) {
                $table->integer('offlinetraining_skill')->default(-1);
            }
            if (!Schema::hasColumn('players', 'stamina')) {
                $table->unsignedSmallInteger('stamina')->default(2520);
            }
            if (!Schema::hasColumn('players', 'skill_fist')) {
                $table->unsignedInteger('skill_fist')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_fist_tries')) {
                $table->unsignedBigInteger('skill_fist_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_club')) {
                $table->unsignedInteger('skill_club')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_club_tries')) {
                $table->unsignedBigInteger('skill_club_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_sword')) {
                $table->unsignedInteger('skill_sword')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_sword_tries')) {
                $table->unsignedBigInteger('skill_sword_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_axe')) {
                $table->unsignedInteger('skill_axe')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_axe_tries')) {
                $table->unsignedBigInteger('skill_axe_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_dist')) {
                $table->unsignedInteger('skill_dist')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_dist_tries')) {
                $table->unsignedBigInteger('skill_dist_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_shielding')) {
                $table->unsignedInteger('skill_shielding')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_shielding_tries')) {
                $table->unsignedBigInteger('skill_shielding_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_fishing')) {
                $table->unsignedInteger('skill_fishing')->default(10);
            }
            if (!Schema::hasColumn('players', 'skill_fishing_tries')) {
                $table->unsignedBigInteger('skill_fishing_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_critical_hit_chance')) {
                $table->unsignedInteger('skill_critical_hit_chance')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_critical_hit_chance_tries')) {
                $table->unsignedBigInteger('skill_critical_hit_chance_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_critical_hit_damage')) {
                $table->unsignedInteger('skill_critical_hit_damage')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_critical_hit_damage_tries')) {
                $table->unsignedBigInteger('skill_critical_hit_damage_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_life_leech_chance')) {
                $table->unsignedInteger('skill_life_leech_chance')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_life_leech_chance_tries')) {
                $table->unsignedBigInteger('skill_life_leech_chance_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_life_leech_amount')) {
                $table->unsignedInteger('skill_life_leech_amount')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_life_leech_amount_tries')) {
                $table->unsignedBigInteger('skill_life_leech_amount_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_mana_leech_chance')) {
                $table->unsignedInteger('skill_mana_leech_chance')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_mana_leech_chance_tries')) {
                $table->unsignedBigInteger('skill_mana_leech_chance_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_mana_leech_amount')) {
                $table->unsignedInteger('skill_mana_leech_amount')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_mana_leech_amount_tries')) {
                $table->unsignedBigInteger('skill_mana_leech_amount_tries')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_criticalhit_chance')) {
                $table->unsignedBigInteger('skill_criticalhit_chance')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_criticalhit_damage')) {
                $table->unsignedBigInteger('skill_criticalhit_damage')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_lifeleech_chance')) {
                $table->unsignedBigInteger('skill_lifeleech_chance')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_lifeleech_amount')) {
                $table->unsignedBigInteger('skill_lifeleech_amount')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_manaleech_chance')) {
                $table->unsignedBigInteger('skill_manaleech_chance')->default(0);
            }
            if (!Schema::hasColumn('players', 'skill_manaleech_amount')) {
                $table->unsignedBigInteger('skill_manaleech_amount')->default(0);
            }
            if (!Schema::hasColumn('players', 'manashield')) {
                $table->unsignedSmallInteger('manashield')->default(0);
            }
            if (!Schema::hasColumn('players', 'max_manashield')) {
                $table->unsignedSmallInteger('max_manashield')->default(0);
            }
            if (!Schema::hasColumn('players', 'xpboost_stamina')) {
                $table->smallInteger('xpboost_stamina')->nullable();
            }
            if (!Schema::hasColumn('players', 'xpboost_value')) {
                $table->tinyInteger('xpboost_value')->nullable();
            }
            if (!Schema::hasColumn('players', 'marriage_status')) {
                $table->unsignedBigInteger('marriage_status')->default(0);
            }
            if (!Schema::hasColumn('players', 'marriage_spouse')) {
                $table->integer('marriage_spouse')->default(-1);
            }
            if (!Schema::hasColumn('players', 'bonus_rerolls')) {
                $table->bigInteger('bonus_rerolls')->default(0);
            }
            if (!Schema::hasColumn('players', 'prey_wildcard')) {
                $table->bigInteger('prey_wildcard')->default(0);
            }
            if (!Schema::hasColumn('players', 'task_points')) {
                $table->bigInteger('task_points')->default(0);
            }
            if (!Schema::hasColumn('players', 'quickloot_fallback')) {
                $table->boolean('quickloot_fallback')->nullable()->default(false);
            }
            if (!Schema::hasColumn('players', 'lookmountbody')) {
                $table->unsignedTinyInteger('lookmountbody')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookmountfeet')) {
                $table->unsignedTinyInteger('lookmountfeet')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookmounthead')) {
                $table->unsignedTinyInteger('lookmounthead')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookmountlegs')) {
                $table->unsignedTinyInteger('lookmountlegs')->default(0);
            }
            if (!Schema::hasColumn('players', 'lookfamiliarstype')) {
                $table->unsignedInteger('lookfamiliarstype')->default(0);
            }
            if (!Schema::hasColumn('players', 'isreward')) {
                $table->boolean('isreward')->default(true);
            }
            if (!Schema::hasColumn('players', 'istutorial')) {
                $table->boolean('istutorial')->default(false);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("players_unique", $indexes)) {
                $table->unique('name', 'players_unique');
            }

            if (!array_key_exists("account_id", $indexes)) {
                $table->index('account_id', 'account_id');
            }

            if (!array_key_exists("vocation", $indexes)) {
                $table->index('vocation', 'vocation');
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
        Schema::dropIfExists('players');
    }
};
