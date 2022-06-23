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
        $check = Schema::hasTable('account_viplist') ? 'table' : 'create';

        Schema::$check('account_viplist', function (Blueprint $table) {
            if (!Schema::hasColumn('account_viplist', 'account_id')) {
                $table->unsignedInteger('account_id')->comment('id of account whose viplist entry it is');
            }
            if (!Schema::hasColumn('account_viplist', 'player_id')) {
                $table->integer('player_id')->comment('id of target player of viplist entry');
            }
            if (!Schema::hasColumn('account_viplist', 'description')) {
                $table->string('description', 128)->default('');
            }
            if (!Schema::hasColumn('account_viplist', 'icon')) {
                $table->unsignedTinyInteger('icon')->default(0);
            }
            if (!Schema::hasColumn('account_viplist', 'notify')) {
                $table->boolean('notify')->default(false);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("account_viplist_unique", $indexes)) {
                $table->unique(['account_id', 'player_id'], 'account_viplist_unique');
            }

            if (!array_key_exists("account_id", $indexes)) {
                $table->index('account_id', 'account_id');
            }

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
        Schema::dropIfExists('account_viplist');
    }
};
